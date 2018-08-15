<?php

namespace App\Console\Commands;

use App\Election;
use App\Jobs\ElectionDecideJob;
use Illuminate\Console\Command;

class ElectionDecideCommand extends Command
{
    /*
    |--------------------------------------------------------------------------
    | Election Decide Command
    |--------------------------------------------------------------------------
    |
    | The purpose of this command is to check if any elections should be
    | decided at the current block index. And, if there are, fire off
    | the job which will handle the decision process.
    |
    */

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'election:decide';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Decide Election Winners';

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
        $elections = Election::undecided()->get();

        foreach($elections as $election)
        {
            ElectionDecideJob::dispatch($election);
        }
    }
}