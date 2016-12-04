<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-4
 * Time: 上午12:18
 */

namespace App\Http\Controllers;


use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

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

    public function create(Request $request){
        return $this->articleRep->create($request);
    }

    public function list(Request $request){
        return $this->articleRep->list($request);
    }

    public function update(Request $request){
        return $this->articleRep->update($request);
    }

    public function check($id, $operator){
        return $this->articleRep->check($id, $operator);
    }

    public function delete($ids){
        return $this->articleRep->delete($ids);
    }

    public function collect($id, $userid){
        return $this->articleRep->collect($id, $userid);
    }

    public function uncollect($id, $userid){
        return $this->articleRep->uncollect($id, $userid);
    }

    public function like($id, $userid){
        return $this->articleRep->like($id, $userid);
    }

    public function unlike($id, $userid){
        return $this->articleRep->unlike($id, $userid);
    }

    public function comment(Request $request){
        return $this->articleRep->comment($request);
    }
}