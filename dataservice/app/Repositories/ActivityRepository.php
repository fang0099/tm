<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 17-1-8
 * Time: 下午1:59
 */

namespace App\Repositories;


use App\Model\Activities;

class ActivityRepository extends BaseRepository
{
    public function __construct(Activities $model)
    {
        $this->model = $model;
    }
}