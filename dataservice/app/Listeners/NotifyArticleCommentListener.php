<?php

namespace App\Listeners;

use App\Events\CommentArticleEvent;
use App\Repositories\ActivityRepository;
use App\Repositories\NoticeRepository;
use App\Repositories\UserRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyArticleCommentListener extends BaseListener
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
     * @param  CommentArticleEvent  $event
     * @return void
     */
    public function handle(CommentArticleEvent $event)
    {
        $article = $event->article;
        $comment = $event->comment;
        $userId = isset($comment['user_id']) ? $comment['user_id'] : 0;
        $user = null;
        if($userId != 0){
            $user = $this->userRep->get($userId);
        }
        // step 1 notify author
        $author = $article->_author();
        if($userId != 0 && $user){
            $message = '匿名用户评论了您的文章 : "' . $article->title . '"';
        }else {
            $message = $user->username . '评论了您的文章 : "' . $article->title . '"';
        }
        $this->addNotice($author->id,  '-2', $article->id, $message, $message);

        // step 2 add comment user activity
        if($userId != 0 && $user){
            $message = '您评论了文章 ';//:  "' . $article->title . '"';
            $this->addActivity($userId, '0', $article->id, $message, $message);
        }
        // add article hot num
        $article->hot_num = $article->hot_num + 100;
        $article->save();
    }
}
