<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午11:15
 */

namespace App\Repositories;

use App\Model\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }


}