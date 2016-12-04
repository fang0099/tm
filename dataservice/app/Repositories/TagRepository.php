<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-4
 * Time: 下午10:53
 */

namespace App\Repositories;

use App\Model\Tag;

class TagRepository extends BaseRepository
{
    public function __construct(Tag $model)
    {
        $this->model = $model;
    }
}