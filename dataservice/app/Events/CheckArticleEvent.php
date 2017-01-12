<?php

namespace App\Events;

use App\Model\Article;
use App\Model\CheckLog;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CheckArticleEvent
{
    use InteractsWithSockets, SerializesModels;

    public $article;
    public $checkLog;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Article $article, $checkLog)
    {
        $this->article = $article;
        $this->checkLog = $checkLog;
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
