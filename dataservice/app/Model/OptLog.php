<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-7
 * Time: 下午10:59
 */

namespace App\Model;


class OptLog extends BaseModel
{
    protected $table = 'opt_log';

    public function user(){
        return $this->belongsTo('App\Model\User', 'to_user');
    }

}