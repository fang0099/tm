<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-4
 * Time: 上午12:18
 */

namespace App\Repositories;


use App\Events\CheckArticleEvent;
use App\Events\CollectArticleEvent;
use App\Events\CommentArticleEvent;
use App\Events\LikeArticleEvent;
use App\Events\ReadArticleEvent;
use App\Model\Article;
use App\Model\Comments;
use App\StatusCode;
use Illuminate\Http\Request;
use DB;

class ArticleRepository extends BaseRepository
{

    private $commentRep;
    private $tagRep;
    private $userRep;
    private $checkLogRep;
    private $webInfoRep;

    public function __construct(Article $model,
                                CommentRepository $commentRep,
                                TagRepository $tagRep,
                                UserRepository $userRep,
                                CheckLogRepository $checkLogRep,
                                WebInfoRepository $webInfoRep)
    {
        $this->model = $model;
        $this->commentRep = $commentRep;
        $this->tagRep = $tagRep;
        $this->userRep = $userRep;
        $this->checkLogRep = $checkLogRep;
        $this->webInfoRep = $webInfoRep;
    }

    public function read($id, $uid){
        $t = $this->get($id);
        if($t == null || $t->del_flag == 1 || $t->has_checked != 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article is not exist', $id);
        }
        $t->click_count = $t->click_count + 1;
        $t->save();
        $author = $t->author;
        if($author){
            $author->password = '***';
        }else {
            //add a anonymous user
        }
        $checker = $t->checker;
        if($checker){
            $checker->password = '***';
        }
        $t->tags;
        event(new ReadArticleEvent($t, $uid));
        return $this->success('', $t);
    }

    public function findById($id){
        $t = $this->get($id);
        if($t == null || $t->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article is not exist', $id);
        }
        $author = $t->author;
        if($author){
            $author->password = '***';
        }else {
            //add a anonymous user
        }
        $checker = $t->checker;
        if($checker){
            $checker->password = '***';
        }
        $t->tags;
        //$t['comments'] = $t->comments;
        return $this->success('', $t);
    }

    public function next($id){
        $article = $this->model->where('has_checked', '=', '1')->where('id', '>', $id)->orderBy('id', 'desc')->where('del_flag', '=', '0')->first();
        return $this->success('', $article);
    }

    public function prev($id){
        $article = $this->model->where('has_checked', '=', '1')->where('id', '<', $id)->orderBy('id', 'desc')->where('del_flag', '=', '0')->first();
        return $this->success('', $article);
    }

    public function listComment($id){
        $article = $this->get($id);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article is not exist', $id);
        }else {
            return $this->success('', $this->commentRep->list($id));
        }
    }

    public function deleteComment($articleId, $commentId){
        DB::delete('delete from comments where id = ? ', [$commentId]);
        DB::update('update article set comment_num = comment_num -1 where id = ?', [$articleId]);
        return $this->success();
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
        $params['checker_id'] = 0;
        unset($params['tags']);
        $article = $this->insertWithId($params);
        $tagIdsArr = explode(',', $tagIds);
        foreach ($tagIdsArr as $t){
            if ($t != '' && ctype_digit($t)){
                DB::insert('insert into tag_article_rel (article_id, tag_id) values (?, ?)', [$article->id, $t]);
            }
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
        if(isset($params['has_checked'])){
            $params['has_checked'] = 0;
        }
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
                if ($t != '' && ctype_digit($t)){
                    DB::insert('insert into tag_article_rel (article_id, tag_id) values (?, ?)', [$article->id, $t]);
                }
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
                $article = $this->get($a->id);
                $a->author = $article->author;
                $a->checker = $article->checker;
                $a->tags = $article->tags;
                $res['list'][] = $a;
            }
        }
        return $this->success('', $res);
    }

    public function check($id, $operator, $result, $message){
        $article = $this->get($id);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article is not exist', $id);
        }else {
            /*
            if($article->has_checked == 1){
                return $this->success();
            }
            */
            // if operator has permission?
            $article->checker_id = $operator;
            // result = 0=checking, 1=checked, -1=reject
            $article->has_checked = $result;
            $article->save();
            // save check log
            $checkLog = array(
                'checker' => $operator,
                'type' => '0',
                'ref_id' => $id,
                'check_result' => $result,
                'message' => $message,
            );
            $this->checkLogRep->insertInternal($checkLog);
            // trigger check article event
            event(new CheckArticleEvent($article, $checkLog));
            return $this->success();
        }
    }

    public function bcheck($ids, $operator){
        $idsArr = explode(',', $ids);
        foreach ($idsArr as $id){
            if($id != '' && ctype_digit($id)){
                $this->check($id, $operator, 1, '审核通过');
            }
        }
        return $this->success();
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
            // trigger collect event
            event(new CollectArticleEvent($article, $userid));
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
            if($count[0]->c == 0){
                DB::insert('insert into user_like_article (user_id, article_id) values (?, ?)', [$userid, $id]);
                $article->likes = $article->likes+1;
                $article->save();
                event(new LikeArticleEvent($article, $userid));
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
            if($count[0]->c > 0){
                DB::delete('delete from user_like_article where user_id = ? and article_id = ?', [$userid, $id]);
                $article->likes = $article->likes - $count[0]->c;
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
            // trigger comment article event
            event(new CommentArticleEvent($article, $params));
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
                if(ctype_digit($t)){
                    DB::insert('replace into tag_article_rel (article_id, tag_id) values (?, ?)', [$articleId, $t]);
                }

            }
        }
        return $this->success();
    }

    public function delTags($articleId, $tagIds){
        $article = $this->get($articleId);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article id not exist', $articleId);
        }else {
            $idsArr = explode(',', $tagIds);
            foreach ($idsArr as $t){
                if(ctype_digit($t)){
                    DB::insert('delete from tag_article_rel where article_id = ? and tag_id = ?', [$articleId, $t]);
                }

            }
        }
        return $this->success();
    }


    public function hotest($tagId, $page, $pageSize = 15){
        $offset = ($page - 1) * $pageSize;
        $articles = $this->model->where('has_checked', '=', '1')->where('del_flag', '=', '0')->orderBy('hot_num', 'desc')->orderBy('click_count', 'desc')
                    ->offset($offset)->limit($pageSize)->get();
        return $this->success('', $articles);
    }

    public function recommend($userid, $page = 1, $pageSize = 15){
        $offset = ($page - 1) * $pageSize;
        $user = $this->userRep->get($userid);
        if($user){
            $tag = $user->subscribeTags()->limit(1)->first();
            if($tag){
                $articles = $tag->articles()->orderBy('publish_time', 'desc')->offset($offset)->limit($pageSize)->get();
                return $this->success('', $articles);
            }
        }
        return $this->hotest(null, $page, $pageSize);
    }

    public function saveDraft(Request $request){
        $params = $this->getParams($request);
        return $this->insertOrUpdate($params);
    }

    public function deleteByUid($id, $uid){
        $article = $this->get($id);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article id not exist', [$id, $uid]);
        }else {
            if($article->author_id == $uid){
                $article->del_flag = 1;
                $article->save();
                return $this->success();
            }else {
                return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article id not exist', [$id, $uid]);
            }
        }
    }

    public function relate($id, $pageSize){
        $article = $this->get($id);
        if($article == null || $article->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'article id not exist', [$id]);
        }else {
            $tags = $article->tags()->get();
            if($tags != null && !$tags->isEmpty()){
                $ids = [];
                foreach ($tags as $t){
                    $ids[] = $t->id;
                }
                $recommendInterval = $this->webInfoRep->getRecommendInterval();
                $idsStr = implode(',', $ids);
                $query = "select a.* from article as a inner join tag_article_rel as rel "
                        . " on a.id = rel.article_id where rel.tag_id in (" . $idsStr .") "
                        . " and a.publish_time >= DATE_SUB(now(), INTERVAL ". $recommendInterval ." day) "
                        . " and a.del_flag = 0 and a.has_checked = 1 order by a.hot_num desc limit " . $pageSize;
                $articles = DB::select($query);
                return $this->success('', $articles);
            }else {
                return $this->success('', []);
            }
        }
    }

}