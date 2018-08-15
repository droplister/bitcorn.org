<?php

namespace App\Jobs;

use App\Election;
use App\Events\ElectionDecidedEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ElectionDecideJob implements ShouldQueue
{
    /*
    |--------------------------------------------------------------------------
    | Election Decide Job
    |--------------------------------------------------------------------------
    |
    | The purpose of this job is to decide, with finality, which candidates
    | received the most votes and then elect enough candidates per the
    | number of open positions, then declare the election decided.
    | 
    */

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Election
     *
     * @var \App\Election
     */
    protected $election;

    /**
     * Create a new job instance.
     *
     * @param  \App\Election  $election
     * @return void
     */
    public function __construct(Election $election)
    {
        $this->election = $election;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Election
        $this->election->candidates()
            ->take($this->election->positions)
            ->orderBy('votes_total', 'desc')
            ->update(['elected' => 1]);

        // Decision
        $this->election->touchTime('decided_at');

        // Announce
        event(new ElectionDecidedEvent($this->election));
    }
}