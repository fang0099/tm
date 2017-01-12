<?php

namespace App\Listeners;

use App\Events\CommentCommentEvent;
use App\Repositories\ActivityRepository;
use App\Repositories\NoticeRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyCommentCommentListener extends BaseListener
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
     * @param  CommentCommentEvent  $event
     * @return void
     */
    public function handle(CommentCommentEvent $event)
    {
        //
    }
}
