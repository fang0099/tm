<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-8
 * Time: 下午10:53
 */

namespace App\Invokers;


class WebInfoInvoker extends BaseInvoker
{

    public function __construct()
    {
        $this->module = 'webinfo';
    }

}