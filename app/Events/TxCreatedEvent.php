<?php

namespace App\Events;

use App\Tx;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TxCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Tx
     *
     * @var \App\Tx
     */
    public $tx;

    /**
     * Create a new event instance.
     * 
     * @param  \App\Tx  $tx
     * @return void
     */
    public function __construct(Tx $tx)
    {
        $this->tx = $tx;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('blockchain');
    }
}