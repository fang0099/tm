<?php

namespace App\Events;

use App\Model\Tag;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SubscribeTagEvent
{
    use InteractsWithSockets, SerializesModels;

    public $tag;
    public $subscriberId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Tag $tag, $subscriberId)
    {
        $this->tag = $tag;
        $this->subscriberId = $subscriberId;
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
