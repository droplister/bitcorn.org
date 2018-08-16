<?php

namespace App\Listeners;

use App\Jobs\SendMessageJob;
use App\Events\ElectionDecidedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AnnounceElectionDecisionListener
{
    /**
     * Handle the event.
     *
     * @param  ElectionDecidedEvent  $event
     * @return void
     */
    public function handle(ElectionDecidedEvent $event)
    {
        $message = $this->getMessage($event->election);

        SendMessageJob::dispatch($message);
    }

    /**
     * Get Message
     *
     * @param  \App\Election  $election
     * @return void
     */
    private function getMessage($election)
    {
        $message = "*{$election->event->name}*\n";
        $message.= "The polls are closed and the election has been decided!\n";
        $message.= "\nCongratulations:\n";

        $elected_candidates = $election->candidates()->elected()->get();

        foreach($elected_candidates as $candidate)
        {
            $message.= "- {$candidate->user->name}\n";
        }

        $message.= "\nYou will be contacted shortly by the Foundation Chairman.";

        return $message;
    }
}