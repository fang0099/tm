<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午11:15
 */

namespace App\Repositories;

use App\Model\User;
use App\StatusCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function findByUsername($username){
        $user = $this->model->where('username', '=', $username)->first();
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['username'=>$username]);
        }else {
            return $this->success('', $user);
        }
    }

    public function findById($id){
        $user = $this->get($id);
        if($user == null || $user->de_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $user->followers_count = $user->followers()->count();
            $user->follow_count = $user->follows()->count();
            $user->password = '***';
            return $this->success('', $user);
        }
    }

    public function create(Request $request){
        $params = $this->getParams($request);
        $username = $params['username'];
        $count = DB::select('select count(*) as c from users where username = ?', [$username]);
        $c = $count[0]->c;
        if($c == 0){
            $params['password'] = md5($params['password']);
            $params['is_auth'] = 0;
            return $this->insertInternal($params);
        }else {
            return $this->fail(StatusCode::UPDATE_ERROR_ALREADY_EXIST, 'username is exist', $params);
        }

    }

    public function list(Request $request){
        return $this->select($request);
    }

    public function update(Request $request){
        $params = $this->getParams($request);
        if(isset($params['password']) && $params['password'] == '***'){
            unset($params['password']);
        }
        return $this->updateInternal($params);
    }

    public function delete($ids){
        $idsArr = explode(',', $ids);
        return $this->batchDeleteInternal($idsArr);
    }

    public function followers($id, $page, $pageSize){
        $user = $this->get($id);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $offset = ($page - 1) * $pageSize;
            $res = $user->followers()->offset($offset)->limit($pageSize)->get();
            return $this->success('', $res);
        }
    }

    public function hasFollower($id, $follower){
        $user = $this->get($id);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $count = DB::select('select count(*) as c from user_follows where user_id = ? and follower_id = ?', [$id, $follower]);
            $c = $count[0]->c;
            if($c > 0){
                return $this->success();
            }else {
                return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL);
            }
        }
    }

    public function hasLike($id, $articleId){
        $user = $this->get($id);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $count = DB::select('select count(*) as c from user_like_article where user_id = ? and article_id = ?', [$id, $articleId]);
            $c = $count[0]->c;
            if($c > 1){
                return $this->success();
            }else {
                return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL);
            }
        }
    }

    public function hasCollect($id, $articleId){
        $user = $this->get($id);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $count = DB::select('select count(*) as c from user_collect_article where user_id = ? and article_id = ?', [$id, $articleId]);
            $c = $count[0]->c;
            if($c > 1){
                return $this->success();
            }else {
                return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL);
            }
        }
    }

    public function follows($id, $page, $pageSize){
        $user = $this->get($id);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $offset = ($page - 1) * $pageSize;
            $res = $user->follows()->offset($offset)->limit($pageSize)->get();
            return $this->success('', $res);
        }
    }

    public function follow($id, $follower){
        $user = $this->get($id);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $count = DB::select('select count(*) as c from user_follows where user_id = ? and follower_id = ?', [$id, $follower]);
            $c = $count[0]->c;
            if($c == 0){
                DB::insert('insert into user_follows (user_id, follower_id) values (?, ?)', [$id, $follower]);
            }
            return $this->success();
        }
    }

    public function unfollow($id, $follower){
        $user = $this->get($id);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            DB::delete('delete from user_follows where user_id = ? and follower_id = ?', [$id, $follower]);
            return $this->success();
        }
    }

    public function articles($order, Request $request){
        $tagIds = $request->input('tags', '');
        $userId = $request->input('userid');
        if(!$userId){
            return $this->fail(StatusCode::PARAMS_ERROR_EMPTY, 'user id can not be null');
        }
        $page  = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 10);
        $tagArr = explode(',', $tagIds);
        $user = $this->get($userId);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$userId]);
        }else {
            $offset = ($page - 1) * $pageSize;
            $articles = $user->articles()->orderBy($order, 'desc')->offset($offset)->limit($pageSize)->get();
            /*
            foreach ($tagArr as $t) {
                $articles->where();
            }
            */
            return $this->success('', $articles);
        }
    }

    public function notice($status, $type, $userId, $page, $pageSize = 15){
        $user = $this->get($userId);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $offset = ($page - 1) * $pageSize;
            $builder = $user->notices();
            if($type){
                $builder->where('type', '=', $type);
            }
            if($status != -1){
                $builder->where('status', '=', $status);
            }
            $ns = $builder->orderBy('publish_time', 'desc')->offset($offset)->limit($pageSize)->get();

            return $this->success('', $ns);
        }
    }

    public function optLog($type, $userId, $page, $pageSize = 15){
        $user = $this->get($userId);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $offset = ($page - 1) * $pageSize;
            if($type == 'all'){
                $ns = $user->optLogs()->orderBy('publish_time', 'desc')->offset($offset)->limit($pageSize)->get();
            }else {
                $ns = $user->optLogs()->where('type', '=', $type)->orderBy('publish_time', 'desc')->offset($offset)->limit($pageSize)->get();
            }

            return $this->success('', $ns);
        }
    }

    public function tags($id, $page, $pageSize = 10){
        $user = $this->get($id);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $offset = ($page - 1) * $pageSize;
            $ts = $user->subscribeTags()->where('del_flag', '=', 0)->offset($offset)->limit($pageSize)->get();
            return $this->success('', $ts);
        }
    }


    public function collectArticles($id, $page, $pageSize = 10){
        $user = $this->get($id);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $offset = ($page - 1) * $pageSize;
            $as = $user->collectArticles()->where('del_flag', '=', 0)->orderBy('id', 'desc')->offset($offset)->limit($pageSize)->get();
            return $this->success('', $as);
        }
    }

    public function tagArticles($id, $page, $pageSize = 10){
        $user = $this->get($id);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $offset = ($page - 1) * $pageSize;
            $sql = "select a.* from article as a inner join tag_article_rel as tr "
                    . " on a.id = tr.article_id "
                    . " inner join tag_subscriber as sr"
                    . " on tr.tag_id = sr.tag_id"
                    . " where sr.subscriber_id = ?"
                    . " limit $offset ," . $pageSize;
            return  $this->success('', DB::select($sql, [$id]));
        }
    }

    public function followersArticle($id, $page, $pageSize = 10){
        $user = $this->get($id);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $offset = ($page - 1) * $pageSize;
            $sql = "select a.* from article as a inner join user_follows as uf "
                . " on a.author_id = uf.user_id"
                . " where uf.follower_id = ?"
                . " limit $offset ," . $pageSize;
            return $this->success('', DB::select($sql, [$id]));
        }
    }

}