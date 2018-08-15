<?php

namespace App\Console\Commands;

use App\Election;
use App\Jobs\ElectionVotingJob;
use Illuminate\Console\Command;

class ElectionVotingCommand extends Command
{
    /*
    |--------------------------------------------------------------------------
    | Election Voting Command
    |--------------------------------------------------------------------------
    |
    | The purpose of this command is to check if any elections are active
    | at the current block index. And, if there are, fire off the job
    | which counts votes in the ballot box.
    |
    */

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'election:voting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Handle Election Voting';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $elections = Election::active()->get();

        foreach($elections as $election)
        {
            ElectionVotingJob::dispatch($election);
        }
    }
}