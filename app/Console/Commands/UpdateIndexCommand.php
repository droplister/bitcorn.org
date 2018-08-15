<?php

namespace App\Console\Commands;

use JsonRPC\Client;
use Cache, Log, Throwable;
use Illuminate\Console\Command;

class UpdateIndexCommand extends Command
{
    /*
    |--------------------------------------------------------------------------
    | Update Index Command
    |--------------------------------------------------------------------------
    |
    | The purpose of this command is to monitor the Counterparty API for its
    | current block height/block index. That value is then cached locally
    | and used as a way to trigger updates when new blocks are found.
    |
    */

    /**
     * Counterparty API
     *
     * @var \JsonRPC\Client
     */
    protected $counterparty;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monitor Index / Trigger Updates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->counterparty = new Client(config('bitcorn.cp.api'));
        $this->counterparty->authentication(config('bitcorn.cp.user'), config('bitcorn.cp.password'));

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try
        {
            // Only fire when necessary
            if($this->isNewBlockIndex())
            {
                // Calculate votes
                $this->call('election:voting');

                // Decide election
                $this->call('election:decide');

                // Update issuance
                $this->call('update:issuance');
            }
        }
        catch(Throwable $e)
        {
            Log::error($e->getMessage());
        }
    }

    /**
     * Check for and cache new index.
     *
     * @return boolean
     */
    private function isNewBlockIndex()
    {
        // Index from API
        $block_index = $this->getBlockIndex();

        // Compare locally
        if($block_index !== Cache::get('block_index'))
        {
            // Reset cache
            $this->forgetBlockIndex();
            $this->setBlockIndex($block_index);

            return true;
        }

        return false;
    }

    /**
     * Counterparty API
     * https://counterparty.io/docs/api/#get_running_info
     *
     * @return integer
     */
    private function getBlockIndex()
    {
        $info = $this->counterparty->execute('get_running_info');

        return $info['bitcoin_block_count'];
    }

    /**
     * Set cache.
     *
     * @return void
     */
    private function setBlockIndex($block_index)
    {
        Cache::forever('block_index', $block_index);
    }

    /**
     * Clear cache.
     *
     * @return void
     */
    private function forgetBlockIndex()
    {
        Cache::forget('block_index');
    }
}