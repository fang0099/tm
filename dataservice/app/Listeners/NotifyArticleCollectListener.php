<?php

namespace App\Listeners;

use App\Events\CollectArticleEvent;
use App\Repositories\ActivityRepository;
use App\Repositories\NoticeRepository;
use App\Repositories\UserRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyArticleCollectListener extends BaseListener
{

    private $userRep;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(NoticeRepository $noticeRep,
                                ActivityRepository $activityRep,
                                UserRepository $userRep)
    {
        $this->noticeRep = $noticeRep;
        $this->activityRep = $activityRep;
        $this->userRep = $userRep;
    }

    /**
     * Handle the event.
     *
     * @param  CollectArticleEvent  $event
     * @return void
     */
    public function handle(CollectArticleEvent $event)
    {
        $article = $event->article;
        $operatorId = $event->operatorId;
        $operator = $this->userRep->get($operatorId);

        // step 1 operator activity
        $message = '您收藏了文章 ';//"'. $article->title . '"';
        $this->addActivity($operatorId, '0', $article->id, $message, $message);

        // step 2 notify author
        $message = $operator->username . ', 收藏了您文章 ';
        $this->addNotice($article->author_id, '0', $article->id,  $message, $message);

        // add article hot num
        $article->hot_num = $article->hot_num + 10;
        $article->save();
    }
}
