<?php

namespace App\Console\Commands;

use App\Asset;
use App\Jobs\UpdateIssuanceJob;
use Illuminate\Console\Command;

class UpdateIssuanceCommand extends Command
{
    /*
    |--------------------------------------------------------------------------
    | Update Issuance Command
    |--------------------------------------------------------------------------
    |
    | The purpose of this command is to fetch the current supply or issuance
    | of assets, like BTC and XCP, and update our records to reflect that
    | data because BTC is always growing and XCP is always shrinking.
    |
    */

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:issuance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Asset Issuance';

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
        $assets = Asset::whereName('XCP')->get();

        foreach($assets as $asset)
        {
            UpdateIssuanceJob::dispatch($asset);
        }
    }
}