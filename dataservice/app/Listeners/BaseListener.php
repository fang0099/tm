<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 17-1-9
 * Time: 下午9:20
 */

namespace App\Listeners;


use App\Repositories\ActivityRepository;
use App\Repositories\NoticeRepository;

class BaseListener
{
    protected $noticeRep;
    protected $activityRep;

    public function __construct(NoticeRepository $noticeRep, ActivityRepository $activityRep)
    {
        $this->noticeRep = $noticeRep;
        $this->activityRep = $activityRep;
    }

    protected function addNotice($toUser, $type, $refId, $title, $message, $status = 0){
        $notice = [
            'to_user' => $toUser,
            'type' => $type,
            'ref_id' => $refId,
            'title' => $title,
            'message' => $message,
            'status' => $status
        ];
        $this->noticeRep->insertInternal($notice);
    }

    protected function addActivity($uid, $type, $refId, $title, $message){
        $activity = [
            'uid' => $uid,
            'type' => $type,
            'ref_id' => $refId,
            'title' => $title,
            'message' => $message
        ];
        $this->activityRep->insertInternal($activity);
    }

}