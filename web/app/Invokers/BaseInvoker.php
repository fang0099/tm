<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-8
 * Time: 下午9:30
 */

namespace App\Invokers;


use App\Traits\ApiInvoker;

class BaseInvoker
{

    use ApiInvoker;

    protected $module;

    public function __call($name, $arguments)
    {
        $this->invoke($this->module, $name, $arguments);
    }

}