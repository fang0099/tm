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

    public function get(Request $request){
        $id = $request->input('id');
        return $this->articleRep->findById($id);
    }

    public function create(Request $request){
        return $this->articleRep->create($request);
    }

    public function list(Request $request){
        return $this->articleRep->list($request);
    }

    public function page(Request $request){
        return $this->articleRep->page($request);
    }

    public function update(Request $request){
        return $this->articleRep->update($request);
    }

    public function listComment(Request $request){
        $id = $request->input('id');
        return $this->articleRep->listComment($id);
    }

    public function deleteComment(Request $request){
        $id = $request->input('article_id');
        $commentId = $request->input('comment_id');
        return $this->articleRep->deleteComment($id, $commentId);
    }

    public function check(Request $request){
        $id = $request->input('id');
        $operator = $request->input('operator');
        return $this->articleRep->check($id, $operator);
    }

    public function delete(Request $request){
        $ids = $request->input('ids');
        return $this->articleRep->delete($ids);
    }

    public function collect(Request $request){
        $id = $request->input('id');
        $userid = $request->input('userid');
        return $this->articleRep->collect($id, $userid);
    }

    public function uncollect(Request $request){
        $id = $request->input('id');
        $userid = $request->input('userid');
        return $this->articleRep->uncollect($id, $userid);
    }

    public function like(Request $request){
        $id = $request->input('id');
        $userid = $request->input('userid');
        return $this->articleRep->like($id, $userid);
    }

    public function unlike(Request $request){
        $id = $request->input('id');
        $userid = $request->input('userid');
        return $this->articleRep->unlike($id, $userid);
    }

    public function comment(Request $request){
        return $this->articleRep->comment($request);
    }


    public function latest($tagId = 0, $page = 1, $pageSize = 15){

    }

    public function hot($tagId = 0, $page = 1, $pageSize = 15){

    }

    public function recommend($page = 1, $pageSize = 15){

    }

    public function upArticles(Request $request){
        $size = $request->input('size', '3');
        return $this->articleRep->upArticles($size);
    }
    public function addTags(Request $request){
        $articleId = $request->input("articleId");
        $tagIds = $request->input('tags');
        return $this->articleRep->addTags($articleId, $tagIds);
    }

    public function delTags(Request $request){
        $articleId = $request->input("articleId");
        $tagIds = $request->input('tags');
        return $this->articleRep->delTags($articleId, $tagIds);
    }

}