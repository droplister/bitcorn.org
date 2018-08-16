<?php

namespace App\Listeners;

use App\Jobs\SendMessageJob;
use App\Events\CandidateCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AnnounceElectionCandidateListener
{
    /**
     * Handle the event.
     *
     * @param  CandidateCreatedEvent  $event
     * @return void
     */
    public function handle(CandidateCreatedEvent $event)
    {
        $message = $this->getMessage($event->candidate);

        SendMessageJob::dispatch($message);
    }

    /**
     * Get Message
     *
     * @param  \App\Candidate  $candidate
     * @return void
     */
    private function getMessage($candidate)
    {
        $message = "*{$candidate->election->event->name}*\n";
        $message.= "{$candidate->user->name} has entered the race!\n\n";
        $message.= "> {$candidate->content}\n\n";
        $message.= "Vote Code: {$candidate->memo}";

        return $message;
    }
}