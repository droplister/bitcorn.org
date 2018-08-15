<?php

namespace App\Events;

use App\Election;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ElectionDecidedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Election
     *
     * @var \App\Election
     */
    public $election;

    /**
     * Create a new event instance.
     * 
     * @param  \App\Election  $election
     * @return void
     */
    public function __construct(Election $election)
    {
        $this->election = $election;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('elections');
    }
}
