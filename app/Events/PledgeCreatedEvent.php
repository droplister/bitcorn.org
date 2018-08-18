<?php

namespace App\Events;

use App\Pledge;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PledgeCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Pledge
     *
     * @var \App\Pledge
     */
    public $pledge;

    /**
     * Create a new event instance.
     * 
     * @param  \App\Pledge  $pledge
     * @return void
     */
    public function __construct(Pledge $pledge)
    {
        $this->pledge = $pledge;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('causes');
    }
}