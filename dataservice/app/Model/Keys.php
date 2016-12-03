<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午2:00
 */

namespace App\Model;

class Keys extends BaseModel
{
    protected $table = 'keys';
    protected $primaryKey = 'app_key';
    public $incrementing = false;

    public function functions(){
        return $this->belongsToMany('App\Model\Functions', 'key_function_rel',
                                'app_key', 'function_id');
    }

}