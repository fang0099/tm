<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-4
 * Time: 上午12:18
 */

namespace App\Repositories;


use App\Model\Article;
use App\Model\Comments;
use App\StatusCode;
use Illuminate\Http\Request;
use DB;

class ArticleRepository extends BaseRepository
{

    private $commentRep;

    public function __construct(Article $model, CommentRepository $commentRep)
    {
        $this->model = $model;
        $this->commentRep = $commentRep;
    }

    public function findById($id){
        $t = $this->get($id);
        if($t == null || $t->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article is not exist', $id);
        }
        $author = $t->author;
        $author->password = '***';
        $checker = $t->checker;
        if($checker){
            $checker->password = '***';
        }
        $t->tags;
        //$t['comments'] = $t->comments;
        return $this->success('', $t);
    }

    public function listComment($id){
        $article = $this->get($id);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article is not exist', $id);
        }else {
            return $this->success('', $this->commentRep->list($id));
        }
    }

    public function create(Request $request){
        $params = $this->getParams($request);
        $content = $params['content'];
        if($content == null || $content == ''){
            return $this->fail(StatusCode::INSERT_ERROR, 'content can not be empty', $params);
        }
        $word_count = utf8_strlen($content);
        $params['word_count'] = $word_count;
        $tagIds = $params['tags'];
        $params['has_checked'] = 0;
        $params['checker'] = 0;
        unset($params['tags']);
        $article = $this->insertWithId($params);
        $tagIdsArr = explode(',', $tagIds);
        foreach ($tagIdsArr as $t){
            DB::insert('insert into tag_article_rel (article_id, tag_id) values (?, ?)', [$article->id, $t]);
        }
        //$article->tags->sync($tagIdsArr);
        return $this->success('', $article);
    }

    public function update(Request $request){
        $params = $this->getParams($request);
        $content = isset($params['content']) ? $params['content'] : '';
        if($content != null && $content != ''){
            $word_count = utf8_strlen($content);
            $params['word_count'] = $word_count;
        }
        //$params['has_checked'] = 0;
        //$params['checker'] = 0;
        $operator = isset($params['operator']) ? $params['operator'] : 0;
        // checke operator has permission?
        unset($params['tags']);
        unset($params['operator']);
        $article = $this->updateWithId($params);
        if($article == null){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL);
        }

        //$article->tags->sync($tagIdsArr);
        if(isset($params['tags'])){
            $tagIds = $params['tags'];
            $tagIdsArr = explode(',', $tagIds);
            DB::delete('delete from tag_article_rel where article_id = ?', [$article->id]);
            foreach ($tagIdsArr as $t){
                DB::insert('insert into tag_article_rel (article_id, tag_id) values (?, ?)', [$article->id, $t]);
            }
        }
        return $this->success('', $article);
    }

    public function list(Request $request){
        $articles = $this->select($request);
        $res = [
            'count' => $articles['count'],
            'current_page' => $articles['current_page'],
            'page_size' => $articles['page_size'],
            'filter' => $articles['filter'],
            'list' => array()];
        $list = $articles['list'];
        //$res['list'] = $articles['list'];
        if(!empty($list)){
            foreach ($list as $a){
                $article = $this->get($a['id']);
                $a['author'] = $article->author;
                $a['checker'] = $article->checker;
                $a['tags'] = $article->tags;
                $res['list'][] = $a;
            }
        }
        return $this->success('', $res);
    }

    public function check($id, $operator){
        $article = $this->get($id);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article is not exist', $id);
        }else {
            // if operator has permission?
            $article->checker = $operator;
            $article->has_checker = 1;
            $article->save();
            return $this->success();
        }
    }

    public function delete($ids){
        $idsArr = explode(',', $ids);
        return $this->batchDeleteInternal($idsArr);
    }

    public function collect($id, $userid){
        $article = $this->get($id);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article id not exist', ['id' => $id, 'userid' => $userid]);
        }else {
            DB::update('replace into user_collect_article (user_id, article_id) values (?, ?)', [$userid, $id]);
            return $this->success();
        }
    }

    public function uncollect($id, $userid){
        $article = $this->get($id);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article id not exist', ['id' => $id, 'userid' => $userid]);
        }else {
            DB::delete('delete from user_collect_article (user_id, article_id) values (?, ?)', [$userid, $id]);
            return $this->success();
        }
    }

    public function like($id, $userid){
        $article = $this->get($id);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article id not exist', ['id' => $id, 'userid' => $userid]);
        }else {
            $count = DB::select('select count(*) as c from user_like_article where user_id = ? and article_id = ?', [$userid, $id]);
            if($count[0]['c'] == 0){
                DB::insert('insert into user_like_article (user_id, article_id) values (?, ?)', [$userid, $id]);
                $article->likes = $article->likes+1;
                $article->save();
                return $this->success();
            }else {
                return $this->fail(StatusCode::UPDATE_ERROR_ALREADY_EXIST, 'already like', ['id' => $id, 'userid' => $userid]);
            }

        }
    }

    public function unlike($id, $userid){
        $article = $this->get($id);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article id not exist', ['id' => $id, 'userid' => $userid]);
        }else {
            $count = DB::select('select count(*) as c from user_like_article where user_id = ? and article_id = ?', [$userid, $id]);
            if($count[0]['c'] > 0){
                DB::delete('delete from user_like_article where user_id = ? and article_id = ?', [$userid, $id]);
                $article->likes = $article->likes - $count[0]['c'];
                $article->save();
            }
            return $this->success();
        }
    }

    public function comment(Request $request){
        $params = $this->getParams($request);
        $articleId = $params['article_id'];
        $article = $this->get($articleId);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article id not exist', $params);
        }else {
            $params['type'] = 0;
            $article->comment_num = $article->comment_num + 1;
            $article->save();
            return $this->commentRep->insertInternal($params);
        }
    }

    public function upArticles($size = 3){
        $articles = $this->model->where('up_flag', '=', '1')->orderBy('publish_time', 'desc')->take($size)->get();
        foreach ($articles as $a){
            $author = $a->author;
            $author->password = '***';
            $a->tags;
        }
        return $this->success('', $articles);
    }

    public function addTags($articleId, $tagIds){
        $article = $this->get($articleId);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article id not exist', $articleId);
        }else {
            $idsArr = explode(',', $tagIds);
            foreach ($idsArr as $t){
                DB::insert('insert into tag_article_rel (article_id, tag_id) values (?, ?)', [$articleId, $t]);
            }
        }
    }

    public function delTags($articleId, $tagIds){
        $article = $this->get($articleId);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article id not exist', $articleId);
        }else {
            $idsArr = explode(',', $tagIds);
            foreach ($idsArr as $t){
                DB::insert('delete from tag_article_rel where article_id = ? and tag_id = ?', [$articleId, $t]);
            }
        }
    }




}