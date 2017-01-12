<?php

namespace App\Listeners;

use App\Events\FollowUserEvent;
use App\Repositories\ActivityRepository;
use App\Repositories\NoticeRepository;
use App\Repositories\UserRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyUserFollowListener extends BaseListener
{
    private $userRep;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserRepository $userRep,
                                NoticeRepository $noticeRep,
                                ActivityRepository $activityRep)
    {
        $this->userRep = $userRep;
        $this->noticeRep = $noticeRep;
        $this->activityRep = $activityRep;
    }

    /**
     * Handle the event.
     *
     * @param  FollowUserEvent  $event
     * @return void
     */
    public function handle(FollowUserEvent $event)
    {
        $user = $event->user;
        $followerId = $event->followerId;

        // step 1 add activity
        $message = "您关注了 ";// . $user->username;
        $this->addActivity($followerId, '3', $user->id, $message, $message);
        // step 2 notify user who be followed
        $message = $user->username . "关注了您";
        $this->addNotice($user->id, '3', $user->id, $message, $message);
    }
}
