<?php

namespace App\Jobs;

use App\Election;
use App\Jobs\SendMessageJob;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ElectionReportJob implements ShouldQueue
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
        if($this->isEnding())
        {
            $message = $this->getMessage();

            SendMessageJob::dispatch($message);
        }
    }

    /**
     * Is Ending?
     * 
     * @return boolean
     */
    private function isEnding()
    {
        $blocks_left = $this->blocksLeft();

        return $blocks_left > 0 && $blocks_left <= 10;
    }

    /**
     * Block Left
     *
     * @return integer
     */
    private function blocksLeft()
    {
        $current_block_index = Cache::get('block_index');

        return $this->election->block_index - $current_block_index;
    }

    /**
     * Get Message
     * 
     * @return string
     */
    private function getMessage()
    {
        $blocks_left = $this->blocksLeft();
        $blocks_word = str_plural('block', $blocks_left);

        $message = "*{$this->election->event->name}*\n";
        $message.= "Ends in {$blocks_left} {$blocks_word}...";

        return $message;
    }
}