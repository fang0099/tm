<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午9:27
 */

namespace App\Traits;


trait DateFormatter
{
    public function getDateTime(){
        return date('Y-m-d H:i:s');
    }

    public function getDate(){
        return date('Y-m-d');
    }
}