<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午1:59
 */

namespace App\Repositories;

use App\Model\Keys;

class KeysRepository extends BaseRepository
{

    public function __construct(Keys $model)
    {
        $this->model = $model;
    }

    public function getByKey($app_key){
        return $this->model->find($app_key);
    }

}