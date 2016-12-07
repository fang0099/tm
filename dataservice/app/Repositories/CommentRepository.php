<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-4
 * Time: 下午10:37
 */

namespace App\Repositories;


use App\Model\Comments;

class CommentRepository extends BaseRepository
{
    public function __construct(Comments $model)
    {
        $this->model = $model;
    }

    public function list($articleId){
        return [];
    }
}