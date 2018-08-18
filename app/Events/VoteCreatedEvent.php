<?php

namespace App\Events;

use App\Vote;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class VoteCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Vote
     *
     * @var \App\Vote
     */
    public $vote;

    /**
     * Create a new event instance.
     * 
     * @param  \App\Vote  $vote
     * @return void
     */
    public function __construct(Vote $vote)
    {
        $this->vote = $vote;
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