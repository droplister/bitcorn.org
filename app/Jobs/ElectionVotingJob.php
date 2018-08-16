<?php

namespace App\Jobs;

use App\Tx;
use App\Vote;
use App\Election;
use JsonRPC\Client;
use Log, Throwable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ElectionVotingJob implements ShouldQueue
{
    /*
    |--------------------------------------------------------------------------
    | Election Voting Job
    |--------------------------------------------------------------------------
    |
    | The purpose of this job is to check for new votes in the ballot box.
    | If there are, we record those votes, and update the candidates
    | overall vote counts to reflect the current standings.
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
     * Election
     *
     * @var \App\Election
     */
    protected $election;

    /**
     * Create a new job instance.
     *
     * @param  \App\Election  $election
     * @return void
     */
    public function __construct(Election $election)
    {
        $this->election = $election;
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
            // Update votes
            foreach($this->election->candidates as $candidate)
            {
                $this->updateVotes($candidate);
            }
        }
        catch(Throwable $e)
        {
            Log::error($e->getMessage());
        }      
    }

    /**
     * Update Votes
     * 
     * @param  \App\Candidate  $candidate
     * @return void
     */
    private function updateVotes($candidate)
    {
        // Find and Save Votes
        $this->findAndSaveVotes($candidate);

        // Update Votes Total
        $this->updateVotesTotal($candidate);
    }

    /**
     * Find and Save Votes
     * 
     * @param  \App\Candidate  $candidate
     * @return void
     */
    private function findAndSaveVotes($candidate)
    {
        // API Data
        $vote_data = $this->getVoteData($candidate);

        foreach($vote_data as $data)
        {
            $tx = Tx::firstOrCreateTx($data);
            $vote = Vote::firstOrCreateVote($candidate, $tx, $data);
        }
    }

    /**
     * Update Votes Total
     * 
     * @param  \App\Candidate  $candidate
     * @return void
     */
    private function updateVotesTotal($candidate)
    {
        // Sum Votes
        $votes_total = $candidate->votes()->sum('amount');

        return $candidate->update([
            'votes_total' => $votes_total,
        ]);
    }

    /**
     * Counterparty API
     * https://counterparty.io/docs/api/#get_table
     *
     * @return mixed
     */
    private function getVoteData($candidate)
    {
        return $this->counterparty->execute('get_sends', [
            'filters' => [
                ['field' => 'asset', 'op' => '==', 'value' => $this->election->asset->name],
                ['field' => 'destination', 'op' => '==', 'value' => config('bitcorn.ballot_address')],
                ['field' => 'memo', 'op' => '==', 'value' => $candidate->memo],
                ['field' => 'status', 'op' => '==', 'value' => 'valid']
            ],
            'end_block' => $this->election->block_index - 1,
        ]);
    }
}