<?php

namespace App\Listeners;

use App\Jobs\UpdateTxJob;
use App\Events\TxCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateTxListener
{
    /**
     * Handle the event.
     *
     * @param  TxCreatedEvent  $event
     * @return void
     */
    public function handle(TxCreatedEvent $event)
    {
        UpdateTxJob::dispatch($event->tx);
    }
}