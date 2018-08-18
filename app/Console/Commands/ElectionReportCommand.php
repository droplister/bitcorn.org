<?php

namespace App\Console\Commands;

use App\Election;
use App\Jobs\ElectionReportJob;
use Illuminate\Console\Command;

class ElectionReportCommand extends Command
{
    /*
    |--------------------------------------------------------------------------
    | Election Report Command
    |--------------------------------------------------------------------------
    |
    | The purpose of this command is to check if any elections are ending
    | soon and if any are it reports that to Telegram as a sort of
    | coundown to the polls closing and the final decision.
    |
    */

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'election:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Report Ending Elections';

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
            ElectionReportJob::dispatch($election);
        }
    }
}