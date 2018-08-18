<?php

namespace App\Events;

use App\Cause;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CauseReviewedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Cause
     *
     * @var \App\Cause
     */
    public $cause;

    /**
     * Create a new event instance.
     * 
     * @param  \App\Cause  $cause
     * @return void
     */
    public function __construct(Cause $cause)
    {
        $this->cause = $cause;
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