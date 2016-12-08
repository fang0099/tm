<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-8
 * Time: 下午10:52
 */

namespace App\Invokers;


class NewsFlashInvoker extends BaseInvoker
{

    public function __construct()
    {
        $this->module = 'newsflash';
    }

}