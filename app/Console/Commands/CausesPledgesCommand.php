<?php

namespace App\Console\Commands;

use App\Cause;
use App\Jobs\CausesPledgesJob;
use Illuminate\Console\Command;

class CausesPledgesCommand extends Command
{
    /*
    |--------------------------------------------------------------------------
    | Causes Pledges Command
    |--------------------------------------------------------------------------
    |
    | The purpose of this command is to constantly check for deposits
    | made using a cause's pledge code by firing the job which
    | handles that function for every cause, always.
    |
    */

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'causes:pledges';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Handle Cause Pledges';

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
        $causes = Cause::get();

        foreach($causes as $cause)
        {
            CausesPledgesJob::dispatch($cause);
        }
    }
}