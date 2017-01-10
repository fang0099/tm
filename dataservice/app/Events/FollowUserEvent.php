<?php

namespace App\Events;

use App\Model\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FollowUserEvent
{
    use InteractsWithSockets, SerializesModels;
    public $user;
    public $followerId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $followerId)
    {
        $this->user = $user;
        $this->followerId = $followerId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
