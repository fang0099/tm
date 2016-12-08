<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-8
 * Time: 下午10:33
 */

namespace App\Invokers;


class FriendLinkInvoker extends BaseInvoker
{
    public function __construct()
    {
        $this->module = 'friendlink';
    }
}