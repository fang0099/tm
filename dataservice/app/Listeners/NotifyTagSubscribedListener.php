<?php

namespace App\Listeners;

use App\Events\SubscribeTagEvent;
use App\Repositories\ActivityRepository;
use App\Repositories\NoticeRepository;
use App\Repositories\UserRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyTagSubscribedListener extends BaseListener
{

    private $userRep;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(NoticeRepository $noticeRep, ActivityRepository $activityRep, UserRepository $userRep)
    {
        $this->noticeRep = $noticeRep;
        $this->userRep = $userRep;
        $this->activityRep = $activityRep;
    }

    /**
     * Handle the event.
     *
     * @param  SubscribeTagEvent  $event
     * @return void
     */
    public function handle(SubscribeTagEvent $event)
    {
        $tag = $event->tag;
        $subscriberId = $event->subscriberId;

        // step 1 add activity
        $message = "订阅了标签 "; //\"" . $tag->title . "\"";
        $this->addActivity($subscriberId, '1', $tag->id, $message, $message);

    }
}
