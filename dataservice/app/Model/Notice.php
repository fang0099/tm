<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-7
 * Time: 下午10:55
 */

namespace App\Model;


class Notice extends BaseModel
{
    protected $table = 'notice';

    public function user(){
        return $this->belongsTo('App\Model\User', 'to_user');
    }
}