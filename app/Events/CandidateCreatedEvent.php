<?php

namespace App\Events;

use App\Candidate;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CandidateCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Candidate
     *
     * @var \App\Candidate
     */
    public $candidate;

    /**
     * Create a new event instance.
     * 
     * @param  \App\Candidate  $candidate
     * @return void
     */
    public function __construct(Candidate $candidate)
    {
        $this->candidate = $candidate;
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
