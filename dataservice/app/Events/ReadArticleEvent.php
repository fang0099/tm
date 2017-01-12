<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Model\Article;

class ReadArticleEvent
{
    use InteractsWithSockets, SerializesModels;

    public $article;
    public $uid;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Article $article, $uid)
    {
        $this->article = $article;
        $this->uid = $uid;
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
