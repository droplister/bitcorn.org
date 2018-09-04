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
        $chat = $this->getChannel($event->pledge->cause);
        $message = $this->getMessage($event->pledge, $chat);

        SendMessageJob::dispatch($message, $chat);
    }

    /**
     * Get Message
     *
     * @param  \App\Pledge  $pledge
     * @return void
     */
    private function getMessage($pledge, $chat)
    {
        $link = route('causes.show', ['cause' => $pledge->cause->id]);
        $amount = "{$pledge->amount_normalized} {$pledge->cause->asset->display_name}";

        $message = "*{$pledge->cause->title}*\n";
        $message.= "{$amount} pledged to [this cause]($link).\n";
        $message.= $chat === 'private' ? "*Cause Inactive - Please investigate.*" : "";

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
        if($cause->hasEnded() || $cause->isRejected())
        {
            return 'private';
        }

        return null;
    }
}