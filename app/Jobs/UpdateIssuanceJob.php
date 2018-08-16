<?php

namespace App\Jobs;

use App\Asset;
use JsonRPC\Client;
use Log, Throwable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateIssuanceJob implements ShouldQueue
{
    /*
    |--------------------------------------------------------------------------
    | Update Issuance Job
    |--------------------------------------------------------------------------
    |
    | The purpose of this job is to fetch the current supply a.k.a. issuance
    | of assets, like BTC and XCP, and update our records to reflect that
    | data because BTC is always growing and XCP is always shrinking.
    |
    */

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Asset
     *
     * @var \App\Asset
     */
    protected $asset;

    /**
     * Counterparty API
     *
     * @var \JsonRPC\Client
     */
    protected $counterparty;

    /**
     * Create a new job instance.
     *
     * @param  \App\Asset  $asset
     * @return void
     */
    public function __construct(Asset $asset)
    {
        $this->asset = $asset;
        $this->counterparty = new Client(config('bitcorn.cp.api'));
        $this->counterparty->authentication(config('bitcorn.cp.user'), config('bitcorn.cp.password'));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try
        {
            // Get issuance
            $issuance = $this->getSupply();

            // Update asset
            $this->asset->update([
                'issuance' => $issuance,
            ]);
        }
        catch(Throwable $e)
        {
            Log::error($e->getMessage());
        }
    }

    /**
     * Counterparty API
     * https://counterparty.io/docs/api/#get_supply
     *
     * @return integer
     */
    private function getSupply()
    {
        return $this->counterparty->execute('get_supply', [
            'asset' => $this->asset->display_name,
        ]);
    }
}