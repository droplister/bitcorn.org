<?php

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
                'long_name' => null,
            ],
            'XCP' => [
                'divisible' => 1,
                'long_name' => null,
            ]
        ];

        $this->seedAssets($pledge_assets, 'pledge');

        $vote_assets = [
            'A13537329360771149435' => [
                'divisible' => 1,
                'long_name' => 'CROPS.VOTE1',
            ],
            'A10892938523260130770' => [
                'divisible' => 1,
                'long_name' => 'CROPS.VOTE2',
            ],
            'A4881693416436280065' => [
                'divisible' => 1,
                'long_name' => 'CROPS.VOTE3',
            ],
            'A9863777744013985218' => [
                'divisible' => 1,
                'long_name' => 'CROPS.VOTE4',
            ],
            'A17489903580598755689' => [
                'divisible' => 1,
                'long_name' => 'CROPS.VOTE5',
            ],
            'A14543556218607916248' => [
                'divisible' => 1,
                'long_name' => 'CROPS.VOTE6',
            ],
            'A2075813956743812002' => [
                'divisible' => 1,
                'long_name' => 'CROPS.VOTE7',
            ],
            'A6141367201565052211' => [
                'divisible' => 1,
                'long_name' => 'CROPS.VOTE8',
            ],
            'A5155817104121712777' => [
                'divisible' => 1,
                'long_name' => 'CROPS.VOTE9',
            ],
            'A15410061088653185720' => [
                'divisible' => 1,
                'long_name' => 'CROPS.VOTE10',
            ],
            'A2499516396892145867' => [
                'divisible' => 1,
                'long_name' => 'CROPS.VOTE11',
            ],
            'A2841223757163771319' => [
                'divisible' => 1,
                'long_name' => 'CROPS.VOTE12',
            ],
            'A17831344322835571411' => [
                'divisible' => 1,
                'long_name' => 'CROPS.VOTE13',
            ],
            'A15066922991017750387' => [
                'divisible' => 1,
                'long_name' => 'CROPS.VOTE14',
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
    private function seedAssets($assets, $type)
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