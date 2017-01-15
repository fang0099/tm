<?php

namespace App\Listeners;

use App\Events\CheckArticleEvent;
use App\Repositories\ActivityRepository;
use App\Repositories\NoticeRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyArticleCheckedListener extends BaseListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(NoticeRepository $noticeRep, ActivityRepository $activityRep)
    {
        $this->noticeRep = $noticeRep;
        $this->activityRep = $activityRep;
    }

    /**
     * Handle the event.
     *
     * @param  CheckArticleEvent  $event
     * @return void
     */
    public function handle(CheckArticleEvent $event)
    {
        $article = $event->article;
        $author = $article->author()->first();
        $checkLog = $event->checkLog;
        // step 1 notify author
        if($checkLog['check_result'] == -1){
            $message = '您好' . $author->username . ', 您的文章 "'. $article->title . '" ' . '审核不通过('. $checkLog['message'] . ')';
        }else {
            $message = '您好' . $author->username .  ', 您的文章 "'. $article->title . '" 审核通过';
        }
        $this->addNotice($author->id, '-1', $article->id, $message, $message);

        // step 2 notify user who follow author
        $followers = $author->followers()->get();
        foreach ($followers as $f){
            $message = '您好' . $f->username .  ', 您关注的作者 ' . $author->username . '发表了文章 ';
            $this->addNotice($f->id, '0', $article->id, $message, $message);
        }

    }
}
