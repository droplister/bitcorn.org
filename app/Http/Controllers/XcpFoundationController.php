<?php

namespace App\Http\Controllers;

use Cache;
use JsonRPC\Client;
use Illuminate\Http\Request;

class XcpFoundationController extends Controller
{
    /**
     * Counterblock API
     *
     * @var \JsonRPC\Client
     */
    protected $counterblock;

    /**
     * Counterparty API
     *
     * @var \JsonRPC\Client
     */
    protected $counterparty;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->counterblock = new Client(config('bitcorn.cb.api'));
        $this->counterblock->authentication(config('bitcorn.cb.user'), config('bitcorn.cb.password'));
        $this->counterparty = new Client(config('bitcorn.cp.api'));
        $this->counterparty->authentication(config('bitcorn.cp.user'), config('bitcorn.cp.password'));
    }

    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Dictionary
        $candidates = [
            'XCPELECTION2019' => [
                'XCPELECTION2019 1' => 'Larry Shelton',
                'XCPELECTION2019 2' => 'Ryan Baptiste',
                'XCPELECTION2019 3' => 'Bench',
                'XCPELECTION2019 4' => 'Osamu Takehisa',
                'XCPELECTION2019 5' => 'Chris Salinas',
                'XCPELECTION2019 6' => 'Ryan Peters',
                'XCPELECTION2019 7' => 'Sasha Hodder',
                'XCPELECTION2019 8' => 'Duncan Krostue',
            ],
            'XCPELECTION2017' => [
                'XCPELECTION2017 1' => 'Michael Sullivan',
                'XCPELECTION2017 2' => 'Shawn Leary',
                'XCPELECTION2017 3' => 'John Villar',
                'XCPELECTION2017 4' => 'JP Janssen',
                'XCPELECTION2017 5' => 'Dante DeAngelis',
                'XCPELECTION2017 6' => 'Trevor Altpeter',
            ],
            'XCPELECTION2016' => [
                'XCPELECTION2016 9' => 'Koji Higashi',
                'XCPELECTION2016 8' => 'Dan Anderson',
                'XCPELECTION2016 7' => 'Haixiong Ouyang',
                'XCPELECTION2016 6' => 'Adam B. Levine',
                'XCPELECTION2016 5' => 'JP Janssen',
                'XCPELECTION2016 4' => 'Matt Young',
                'XCPELECTION2016 3' => 'Trevor Altpeter',
                'XCPELECTION2016 2' => 'Jeremy Johnson aka "J-Dog"',
                'XCPELECTION2016 1' => 'Krassimir Stoynov',
            ],
            'XCPELECTION' => [
                'XCPELECTION 1' => 'Devon Weller',
                'XCPELECTION 2' => 'Robert Ross',
                'XCPELECTION 3' => 'Chris DeRose',
                'XCPELECTION 4' => 'JP Janssen',
            ],
        ];

        // Validation
        $request->validate([
            'prefix' => 'sometimes|in:XCPELECTION,XCPELECTION2016,XCPELECTION2017,XCPELECTION2019',
        ]);

        // Dynamic for "back testing"
        $prefix = $request->input('prefix', 'XCPELECTION2019');

        // Calculates all the voting
        $votes = Cache::remember($prefix . '_xcp_vote', '10', function () use ($prefix) {
            // Election Broadcasts
            $election_broadcasts = $this->getBroadcasts($prefix);

            // Broadcast Addresses
            $broadcast_addresses = collect($election_broadcasts)->groupBy('source')->keys();

            // Candidates w/ Votes
            $candidates_with_votes = collect($election_broadcasts)->groupBy('text')->all();

            // Actual XCP Balances
            $actual_votes_balances = $this->combinedEscrowBalances($broadcast_addresses);

            // Quick Votes Estimate
            $quick_voting_estimate = $this->countBroadcastedVotes($actual_votes_balances, $candidates_with_votes);

            // Accuracy Not Assured
            return $quick_voting_estimate;
        });

        return view('xcp-election', compact('candidates', 'prefix', 'votes'));
    }

    // Broadcasts
    // Get broadcasts using election prefix
    private function getBroadcasts($prefix) {
        // Voting Periods
        if($prefix === 'XCPELECTION2019') {
            $start_block = 583350;
            $end_block = 585350;
        } elseif($prefix === 'XCPELECTION2017') {
            $start_block = 462450;
            $end_block = 464556;
        } elseif($prefix === 'XCPELECTION2016') {
            $start_block = 407900;
            $end_block = 409774;
        } elseif($prefix === 'XCPELECTION') {
            $start_block = 350710;
            $end_block = 352718;
        } else {
            $start_block = $end_block = null;
        }

        // Counterparty API
        return $this->counterparty->execute('get_broadcasts', [
            'filters' => [
                ['field' => 'text', 'op' => 'LIKE', 'value' => $prefix . '%'],
            ],
            'start_block' => $start_block,
            'end_block' => $end_block,
        ]);
    }

    // Real Balance
    // Combine unescrowed XCP balance with escrowed balance
    private function combinedEscrowBalances($broadcast_addresses) {
	// Balances
        $balances = $this->getBalances($broadcast_addresses);

	// Escrowed Balances
        $escrow = $this->getEscrowedBalances($broadcast_addresses);

        // Start w/ an Array
        $actual_balances = [];

        // Combine Balances
        foreach($balances as $balance) {
            // Assume No Escrow
            $escrowed_quantity = 0;

            // Handle Escrow
            if(isset($escrow[$balance['address']]['XCP'])) {
                $escrowed_quantity = $escrow[$balance['address']]['XCP'];
            }

            // Report
            $actual_balances[] = [
                'address' => $balance['address'],
                'balance' => $balance['quantity'] + $escrowed_quantity,
            ];
        }

        // Group & Report
        return collect($actual_balances)->groupBy('address')->all();
    }

    // Balances
    // Get non-escrowed XCP balance of broadcasters
    private function getBalances($broadcast_addresses) {
        // Counterparty API
        return $this->counterparty->execute('get_balances', [
            'filters' => [
                ['field' => 'asset', 'op' => '==', 'value' => 'XCP'],
                ['field' => 'address', 'op' => 'IN', 'value' => $broadcast_addresses],
            ],
        ]);
    }

    // Escrowed
    // Get escrowed XCP balance of broadcasters
    private function getEscrowedBalances($broadcast_addresses) {
        // Counterparty API
        return $this->counterblock->execute('get_escrowed_balances', [
            'addresses' => $broadcast_addresses,
        ]);
    }

    // Count Votes
    // Tries to summarize current vote standings
    private function countBroadcastedVotes($balances, $candidates) {
        // Start w/ an Array
        $voting_thus_far = [];

        // "Counting"
        foreach($candidates as $candidate => $votes) {
            // Amount
            $xcp_voted = $this->sanityCheckVotes($balances, $votes);

            // Report
            $voting_thus_far[] = [
                'candidate' => $candidate,
                'xcp_voted' => $xcp_voted,
                'broadcast_count' => count($votes),
            ];
        }

        // Sort & Report
        return collect($voting_thus_far)->sortByDesc('xcp_voted');
    }

    // Sanity Check 
    // Will catch: Voted 2 XCP, but only has 1 XCP.
    // Wont catch: Voted 1 XCP twice but has 1 XCP.
    // Wont catch: Some past votes (hard to check).
    private function sanityCheckVotes($balance, $votes) {
        // Start @ Zero
        $xcp_voted = 0;

        // "Validation"
        foreach($votes as $vote) {
            // Check Balance
            $voter_has_enough_xcp = isset($balance[$vote['source']]) ? $balance[$vote['source']] >= toSatoshi($vote['value']) : false;

            // Add XCP Votes
            if($voter_has_enough_xcp && $vote['value'] > 0 && $vote['value'] < 100000) {
                $xcp_voted += $vote['value'];
            }
        }

        // Report Vote
        return $xcp_voted;
    }
}