<?php

namespace App\Listeners;

use App\Events\LikeArticleEvent;
use App\Repositories\ActivityRepository;
use App\Repositories\NoticeRepository;
use App\Repositories\UserRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyArticleLikeListener extends BaseListener
{

    private $userRep;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserRepository $userRep, NoticeRepository $noticeRep, ActivityRepository $activityRep)
    {
        $this->userRep = $userRep;
        $this->activityRep = $activityRep;
        $this->noticeRep = $noticeRep;
    }

    /**
     * Handle the event.
     *
     * @param  LikeArticleEvent  $event
     * @return void
     */
    public function handle(LikeArticleEvent $event)
    {
        $article = $event->article;
        $operatorId = $event->operatorId;
        $operator = $this->userRep->get($operatorId);
        if($operatorId && $operator){
            // step 1 add activity
            $message = "您点赞了文章 ";// \" " . $article->title . "\"";
            $this->addActivity($operatorId, '0', $article->id, $message, $message);
            // step 2 add notice
            $message = $operator->username . " 点赞了您的文章 ";
            $this->addNotice($article->author_id, '0', $article->id, $message, $message);
        }

    }
}
