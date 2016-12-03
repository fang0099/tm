<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-4
 * Time: 上午12:18
 */

namespace App\Http\Controllers;


use App\Repositories\ArticleRepository;

class ArticleController
{
    private $articleRep;

    public function __construct(ArticleRepository $articleRep)
    {
        $this->articleRep = $articleRep;
    }

    public function get($id){
        return $this->articleRep->findById($id);
    }
}