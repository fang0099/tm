<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-4
 * Time: 上午12:18
 */

namespace App\Repositories;


use App\Model\Article;

class ArticleRepository extends BaseRepository
{
    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function findById($id){
        $t = $this->get($id);
        $t['author'] = $t->_author;
        $t['checker'] = $t->_checker;
        $t['comments'] = $t->comments;
        return $t;
    }

}