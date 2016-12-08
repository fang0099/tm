<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-8
 * Time: 下午10:51
 */

namespace App\Invokers;


class TagInvoker extends BaseInvoker
{

    public function __construct()
    {
        $this->module = 'tag';
    }

}