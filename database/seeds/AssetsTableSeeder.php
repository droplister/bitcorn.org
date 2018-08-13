<?php

namespace App\Database\Seeds;

use App\Asset;
use JsonRPC\Client;
use Illuminate\Database\Seeder;

class AssetsTableSeeder extends Seeder
{
    /**
     * Counterparty API
     *
     * @var \JsonRPC\Client
     */
    protected $counterparty;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->counterparty = new Client(config('bitcorn.cp.api'));
        $this->counterparty->authentication(config('bitcorn.cp.user'), config('bitcorn.cp.password'));
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pledge_assets = [
            'BITCORN' => [
                'divisible' => 0,
            ],
            'XCP' => [
                'divisible' => 1,
            ]
        ];

        $this->seedAssets($pledge_assets, 'pledge');

        $vote_assets = [
            'CROPS.VOTE0' => [
                'divisible' => 1,
            ],
            'CROPS.VOTE1' => [
                'divisible' => 1,
            ],
            'CROPS.VOTE2' => [
                'divisible' => 1,
            ],
            'CROPS.VOTE3' => [
                'divisible' => 1,
            ],
            'CROPS.VOTE4' => [
                'divisible' => 1,
            ],
            'CROPS.VOTE5' => [
                'divisible' => 1,
            ],
            'CROPS.VOTE6' => [
                'divisible' => 1,
            ],
            'CROPS.VOTE7' => [
                'divisible' => 1,
            ],
            'CROPS.VOTE8' => [
                'divisible' => 1,
            ],
            'CROPS.VOTE9' => [
                'divisible' => 1,
            ],
            'CROPS.VOTE10' => [
                'divisible' => 1,
            ],
            'CROPS.VOTE11' => [
                'divisible' => 1,
            ],
            'CROPS.VOTE12' => [
                'divisible' => 1,
            ],
            'CROPS.VOTE13' => [
                'divisible' => 1,
            ],
        ];

        $this->seedAssets($vote_assets, 'vote');
    }

    /**
     * Seed Assets
     *
     * @param  array  $assets
     * @param  string  $type
     * @return void
     */
    private seedAssets($assets, $type)
    {
        // Each asset
        foreach($assets as $asset => $data)
        {
            // Get supply
            $issuance = $this->getSupply($asset);

            // Create it!
            Asset::create([
                'type' => $type,
                'name' => $asset,
                'issuance' => $issuance,
                'divisible' => $data['divisible'],
            ]);
        }
    }

    /**
     * Get Supply
     * 
     * @param  array  $asset
     * @return integer
     */
    private function getSupply($asset)
    {
        return $this->counterparty->execute('get_supply', [
            'asset' => $asset,
        ]);
    }
}