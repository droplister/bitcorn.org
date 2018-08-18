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
        sleep(10); // Causes Are Updated After Pledge

        $this->updateFundedAt($event->pledge->cause);
    }

    /**
     * Update Funded At
     *
     * @param  \App\Cause  $cause
     * @return void
     */
    private function updateFundedAt($cause)
    {
        if(! $cause->isFunded() && $cause->pledged >= $cause->target)
        {
            $cause->touchTime('funded_at');

            $this->sendMessage($cause);
        }
    }

    /**
     * Send Message
     *
     * @param  \App\Cause  $cause
     * @return void
     */
    private function sendMessage($cause)
    {
        $message = $this->getMessage($cause);

        SendMessageJob::dispatch($message);
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