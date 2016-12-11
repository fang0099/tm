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
        $t['author'] = $t->_author;
        $t['checker'] = $t->_checker;
        $t['tags'] = $t->tags;
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
        $article->tags->sync($tagIdsArr);
        return $this->success();
    }

    public function update(Request $request){
        $params = $this->getParams($request);
        $content = $params['content'];
        if($content != null && $content != ''){
            $word_count = utf8_strlen($content);
            $params['word_count'] = $word_count;
        }
        $tagIds = $params['tags'];
        //$params['has_checked'] = 0;
        //$params['checker'] = 0;
        $operator = $params['operator'];
        // checke operator has permission?
        unset($params['tags']);
        unset($params['operator']);
        $article = $this->updateWithId($params);
        if($article == null){
            return $this->fail();
        }
        $tagIdsArr = explode(',', $tagIds);
        $article->tags->sync($tagIdsArr);
        return $this->success();
    }

    public function list(Request $request){
        $articles = $this->select($request);
        $res = [];
        foreach ($articles as $a){
            $a['author'] = $a->_author;
            $a['checker'] = $a->_checker;
            $a['tags'] = $a->tags;
            $res[] = $a;
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
            DB::query('replace into user_collect_article (user_id, article_id) values (?, ?)', $userid, $id);
            return $this->success();
        }
    }

    public function uncollect($id, $userid){
        $article = $this->get($id);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article id not exist', ['id' => $id, 'userid' => $userid]);
        }else {
            DB::query('delete from user_collect_article (user_id, article_id) values (?, ?)', $userid, $id);
            return $this->success();
        }
    }

    public function like($id, $userid){
        $article = $this->get($id);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article id not exist', ['id' => $id, 'userid' => $userid]);
        }else {
            $count = DB::query('select count(*) as c from user_like_article where user_id = ? and article_id = ?', $userid, $id);
            if($count[0]['c'] == 0){
                DB::query('insert into user_like_article (user_id, article_id) values (?, ?)', $userid, $id);
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
            $count = DB::query('select count(*) as c from user_like_article where user_id = ? and article_id = ?', $userid, $id);
            if($count[0]['c'] > 0){
                DB::query('delete from user_like_article where user_id = ? and article_id = ?', $userid, $id);
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
            return $this->commentRep->insertInternal($params);
        }
    }




}