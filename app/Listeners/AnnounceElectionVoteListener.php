<?php

namespace App\Listeners;

use App\Jobs\SendMessageJob;
use App\Events\VoteCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AnnounceElectionVoteListener
{
    /**
     * Handle the event.
     *
     * @param  VoteCreatedEvent  $event
     * @return void
     */
    public function handle(VoteCreatedEvent $event)
    {
        $message = $this->getMessage($event->vote);

        SendMessageJob::dispatch($message);
    }

    /**
     * Get Message
     *
     * @param  \App\Vote  $vote
     * @return void
     */
    private function getMessage($vote)
    {
        $message = "*{$vote->candidate->election->event->name}*\n";
        $link = route('elections.show', ['election' => $vote->candidate->election->id]);
        $message.= "+{$vote->amount_normalized} votes for [{$vote->candidate->user->name}]($link) ({$vote->candidate->memo})";

        return $message;
    }
}