<?php

namespace App\Jobs;

use App\Tx;
use App\Cause;
use App\Pledge;
use JsonRPC\Client;
use Cache, Log, Throwable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CausesPledgesJob implements ShouldQueue
{
    /*
    |--------------------------------------------------------------------------
    | Causes Pledges Job
    |--------------------------------------------------------------------------
    |
    | The purpose of this job is to check for new pledges at the deposit
    | address. If there are, we record those pledges, and update the
    | causes to reflect the current funding.
    | 
    */

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Cause
     *
     * @var \App\Cause
     */
    protected $cause;

    /**
     * Counterparty API
     *
     * @var \JsonRPC\Client
     */
    protected $counterparty;

    /**
     * Create a new job instance.
     *
     * @param  \App\Cause  $cause
     * @return void
     */
    public function __construct(Cause $cause)
    {
        $this->cause = $cause;
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
            $this->updatePledges();
        }
        catch(Throwable $e)
        {
            Log::error($e->getMessage());
        }      
    }

    /**
     * Update Pledges
     * 
     * @return void
     */
    private function updatePledges()
    {
        // Find and Save Pledges
        $this->findAndSavePledges();

        // Update Total Pledged
        $this->updateTotalPledged();

        // Update Funded At
        $this->updateFundedAt();
    }

    /**
     * Find and Save Pledges
     * 
     * @return void
     */
    private function findAndSavePledges()
    {
        // API Data
        $pledge_data = $this->getPledgeData();

        foreach($pledge_data as $data)
        {
            $tx = Tx::firstOrCreateTx($data);
            $pledge = Pledge::firstOrCreatePledge($this->cause, $tx, $data);
        }
    }

    /**
     * Update Total Pledged
     * 
     * @return void
     */
    private function updateTotalPledged()
    {
        // Sum Pledges
        $total_pledged = $this->cause->pledges()->sum('amount');

        return $this->cause->update([
            'pledged' => $total_pledged,
        ]);
    }

    /**
     * Update Funded At
     * 
     * @return void
     */
    private function updateFundedAt()
    {
        if(! $this->cause->isFunded() && $this->cause->pledged >= $this->cause->target)
        {
            return $this->cause->touchTime('funded_at');
        }
    }

    /**
     * Counterparty API
     * https://counterparty.io/docs/api/#get_table
     *
     * @return mixed
     */
    private function getPledgeData()
    {
        $end_block = Cache::get('block_index') - config('bitcorn.confirmations');

        return $this->counterparty->execute('get_sends', [
            'filters' => [
                ['field' => 'asset', 'op' => '==', 'value' => $this->cause->asset->name],
                ['field' => 'destination', 'op' => '==', 'value' => $this->cause->address],
                ['field' => 'memo', 'op' => '==', 'value' => $this->cause->memo],
                ['field' => 'status', 'op' => '==', 'value' => 'valid']
            ],
            'end_block' => $end_block,
        ]);
    }
}