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

    public function read(Request $request){
        $id = $request->input('id');
        $uid = $request->input('uid', 0);
        return $this->articleRep->read($id, $uid);
    }

    public function next(Request $request){
        $id = $request->input('id');
        //return $this->articleRep->page2(1, 1, ['id gt' => $id ], 'id desc');
        return $this->articleRep->next($id);
    }

    public function prev(Request $request){
        $id = $request->input('id');
        //return $this->articleRep->page2(1, 1, ['id lt' => $id ], 'id desc');
        return $this->articleRep->prev($id);
    }

    public function create(Request $request){
        return $this->articleRep->create($request);
    }

    public function list(Request $request){
        return $this->articleRep->list($request);
    }

    public function page(Request $request){
        $page = $request->input('page',1);
        $pageSize = $request->input('pageSize', 15);
        $filter = $request->input('filter', array("has_checked eq" => 1));
        $order = 'publish_time desc';
        return $this->articleRep->page2($page, $pageSize, $filter, $order);
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
        $result = $request->input('result', '-1');
        $message = $request->input('message');
        return $this->articleRep->check($id, $operator, $result, $message);
    }

    public function bcheck(Request $request){
        $ids = $request->input('ids');
        $operator = $request->input('operator');
        return $this->articleRep->bcheck($ids, $operator);
    }

    public function apage(Request $request){
        $page = $request->input('page',1);
        $pageSize = $request->input('pageSize', 500);
        $filter = $request->input('filter', array());
        $order = 'publish_time desc';
        return $this->articleRep->page2($page, $pageSize, $filter, $order);
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

    public function hot(Request $request){
        $tagId = $request->input('tagid', 0);
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 15);
        return $this->articleRep->hotest($tagId, $page, $pageSize);
    }

    public function recommend(Request $request){
        $userid = $request->input('userid', 0);
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 15);
        return $this->articleRep->recommend($userid, $page, $pageSize);
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

    public function saveDraft(Request $request){
        return $this->articleRep->saveDraft($request);
    }

    public function getDraft(Request $request){
        $id = $request->input('id');
        return $this->articleRep->findById($id);
    }

    public function relate(Request $request){
        $id = $request->input('id');
        $pageSize = $request->input('pageSize', 10);
        return $this->articleRep->relate($id, $pageSize);
    }

}