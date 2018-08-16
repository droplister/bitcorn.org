<?php

namespace App\Jobs;

use App\Tx;
use Carbon\Carbon;
use JsonRPC\Client;
use Log, Throwable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateTxJob implements ShouldQueue
{
    /*
    |--------------------------------------------------------------------------
    | Update Tx Job
    |--------------------------------------------------------------------------
    |
    | The purpose of this job is to fetch additional data about the tx.
    |
    */

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Counterparty API
     *
     * @var \JsonRPC\Client
     */
    protected $counterparty;

    /**
     * Tx
     *
     * @var \App\Tx
     */    
    protected $tx;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Tx $tx)
    {
        $this->counterparty = new Client(config('bitcorn.cp.api'));
        $this->counterparty->authentication(config('bitcorn.cp.user'), config('bitcorn.cp.password'));
        $this->tx = $tx;
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
            $data = $this->getRawTransaction();

            $confirmed_at = Carbon::createFromTimestamp($data['blocktime'])->toDateTimeString();

            $this->tx->update([
                'confirmed_at' => $confirmed_at,
            ]);

        }
        catch(Throwable $e)
        {
            Log::error($e->getMessage());
        }
    }

    /**
     * Counterparty API
     * https://counterparty.io/docs/api/#getrawtransaction
     *
     * @return mixed
     */
    private function getRawTransaction()
    {
        return $this->counterparty->execute('getrawtransaction', [
            'tx_hash' => $this->tx->tx_hash,
            'verbose' => true,
        ]);
    }
}