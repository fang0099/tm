<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-18
 * Time: 下午8:03
 */

namespace App\Invokers;


class SliderInvoker extends BaseInvoker
{
    public function __construct()
    {
        $this->module = 'slider';
    }
}