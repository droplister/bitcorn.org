<?php

namespace App\Listeners;

use App\Jobs\SendMessageJob;
use App\Events\PledgeCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateCauseFundedAtListener
{
    /**
     * Handle the event.
     *
     * @param  PledgeCreatedEvent  $event
     * @return void
     */
    public function handle(PledgeCreatedEvent $event)
    {
        if($event->pledge->cause->pledged >= $event->pledge->cause->target)
        {
            $event->pledge->cause->touchTime('funded_at');

            $message = $this->getMessage($event->pledge->cause);

            SendMessageJob::dispatch($message);
        }
    }

    /**
     * Get Message
     *
     * @param  \App\Cause  $cause
     * @return void
     */
    private function getMessage($cause)
    {
        $message = "*{$cause->title}*\n";
        $link = route('causes.show', ['cause' => $cause->id]);
        $message.= "Target of {$cause->target_normalized} {$cause->asset->display_name} has [been met]($link)!";

        return $message;
    }
}