<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-8
 * Time: 下午9:29
 */

namespace App\Invokers;


class UserInvoker extends BaseInvoker
{
    public function __construct()
    {
        $this->module = 'user';
    }


}