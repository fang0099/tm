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

    public function findById($id){
        $user = $this->get($id);
        if($user == null || $user->de_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $user->followers_count = $user->followers()->count();
            $user->password = '***';
            return $this->success('', $user);
        }
    }

    public function create(Request $request){
        $params = $this->getParams($request);
        $username = $params['username'];
        $count = DB::query('select count(*) as c from users where username = ?', $username);
        $c = $count[0]['c'];
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
        if($params['password'] == '***'){
            unset($params['password']);
        }
        return $this->updateInternal($params);
    }

    public function delete($ids){
        $idsArr = explode(',', $ids);
        return $this->batchDeleteInternal($idsArr);
    }

    public function followers($id, $page){
        $user = $this->get($id);
        if($user == null || $user->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'user is not exist', ['id'=>$id]);
        }else {
            $pageSize = config('page_size', 15);
            $offset = ($page - 1) * $pageSize;
            $res = $user->followers()->offset($offset)->limit($pageSize)->get();
            return $this->success('', $res);
        }
    }



}