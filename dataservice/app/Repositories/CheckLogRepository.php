<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 17-1-8
 * Time: 下午2:09
 */

namespace App\Repositories;


use App\Model\CheckLog;

class CheckLogRepository extends BaseRepository
{
    public function __construct(CheckLog $model)
    {
        $this->model = $model;
    }

}