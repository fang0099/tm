<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-8
 * Time: 下午10:50
 */

namespace App\Invokers;


class CommentInvoker extends BaseInvoker
{

    public function __construct()
    {
        $this->module = 'comment';
    }

}