<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ElectionDecidedEvent' => [
            'App\Listeners\AnnounceElectionDecisionListener',
        ],
        'App\Events\CandidateCreatedEvent' => [
            'App\Listeners\AnnounceElectionCandidateListener',
        ],
        'App\Events\VoteCreatedEvent' => [
            'App\Listeners\AnnounceElectionVoteListener',
        ],
        'App\Events\PledgeCreatedEvent' => [
            'App\Listeners\UpdateCauseFundedAtListener',
            'App\Listeners\AnnounceCausePledgeListener',
        ],
        'App\Events\TxCreatedEvent' => [
            'App\Listeners\UpdateTxListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
