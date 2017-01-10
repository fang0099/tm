<?php

namespace App\Events;

use App\Model\Article;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CommentArticleEvent
{
    use InteractsWithSockets, SerializesModels;

    public $article;
    public $comment;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Article $article, $comment)
    {
        $this->article = $article;
        $this->comment = $comment;
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
