<?php

namespace App\Listeners;

use App\Jobs\SendMessageJob;
use App\Events\PledgeCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AnnounceCausePledgeListener
{
    /**
     * Handle the event.
     *
     * @param  PledgeCreatedEvent  $event
     * @return void
     */
    public function handle(PledgeCreatedEvent $event)
    {
        $message = $this->getMessage($event->pledge);
        $channel = $this->getChannel($event->pledge->cause);

        SendMessageJob::dispatch($message, $channel);
    }

    /**
     * Get Message
     *
     * @param  \App\Pledge  $pledge
     * @return void
     */
    private function getMessage($pledge)
    {
        $message = "*{$pledge->cause->title}*\n";
        $link = route('causes.show', ['cause' => $pledge->cause->id]);
        $message.= "{$pledge->amount_normalized} {$pledge->cause->asset->display_name} pledged to [this cause]($link).\n";
        $message.= $pledge->cause->hasEnded() && $pledge->cause->fundsWereReleased() ? "*PLEDGE RECEIVED AFTER PAYOUT*" : "";

        return $message;
    }

    /**
     * Get Channel
     *
     * @param  \App\Cause  $cause
     * @return void
     */
    private function getChannel($cause)
    {
        if($cause->hasEnded())
        {
            return 'private';
        }

        return null;
    }
}