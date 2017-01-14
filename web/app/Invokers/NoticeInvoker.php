<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 17-1-14
 * Time: 下午11:56
 */

namespace App\Invokers;


class NoticeInvoker extends BaseInvoker
{
    public function __construct()
    {
        $this->module = "notice";
    }
}