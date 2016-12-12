<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-4
 * Time: 下午10:53
 */

namespace App\Repositories;

use App\Model\Tag;
use Illuminate\Http\Request;
use App\StatusCode;
use DB;

class TagRepository extends BaseRepository
{
    public function __construct(Tag $model)
    {
        $this->model = $model;
    }

    public function findById($id){
        return $this->getById($id);
    }

    public function create(Request $request){
        $params = $this->getParams($request);
        $params['has_checked'] = 0;
        $params['checker'] = 0;
        $params['fans_num'] = 0;
        return $this->insertInternal($params);
    }

    public function update(Request $request){
        $params = $this->getParams($request);
        return $this->updateInternal($params);
    }

    public function list(Request $request){
        return $this->select($request);
    }

    public function delete($ids){
        $idsArr = explode(',', $ids);
        return $this->batchDeleteInternal($idsArr);
    }

    public function check($id, $operator){
        $tag = $this->get($id);
        if($tag == null || $tag->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'tag is not exist', ['id'=>$id, 'operator'=>$operator]);
        }
        else {
            // check operator permission
            $tag->has_checked = 1;
            $tag->checker = $operator;
            $tag->save();
            return $this->success();
        }
    }

    public function subscribe($id, $subscriber){
        $tag = $this->get($id);
        if($tag == null || $tag->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'tag is not exist', ['id'=>$id, 'operator'=>$operator]);
        }
        else {
            $count = DB::select('select count(*) as c from tag_subscriber where subscriber_id = ? and tag_id = ?', [$subscriber, $id]);
            $c = $count[0]->c;
            if($c == 0){
                DB::insert('insert into tag_subscriber (subscriber_id, tag_id) values (?, ?)', [$subscriber, $id]);
                $tag->fans_num = $tag->fans_num + 1;
                $tag->save();
            }
            return $this->success();
        }
    }

    public function unsubscribe($id, $subscriber){
        $tag = $this->get($id);
        if($tag == null || $tag->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'tag is not exist', ['id'=>$id, 'operator'=>$operator]);
        }
        else {
            $count = DB::select('select count(*) as c from tag_subscriber where subscriber_id = ? and tag_id = ?', [$subscriber, $id]);
            $c = $count[0]->c;
            if ($c > 0) {
                DB::delete('delete from tag_subscriber where subscriber_id = ? and tag_id = ?', [$subscriber, $id]);
                $tag->fans_num = $tag->fans_num - $c;
                $tag->save();
            }
            return $this->success();
        }
    }

    public function articles($id, $page){
        $tag = $this->get($id);
        if($tag == null || $tag->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'tag is not exist', ['id'=>$id, 'operator'=>$operator]);
        }
        else {
            $pageSize = 15;
            $offset = ($page - 1) * $pageSize;
            $articles = $tag->articles()->offset($offset)->limit($pageSize)->get();
            return $this->success('', $articles);
        }
    }

    public function subscriber($id, $page){
        $tag = $this->get($id);
        if($tag == null || $tag->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'tag is not exist', ['id'=>$id, 'operator'=>$operator]);
        }
        else {
            $pageSize = 15;
            $offset = ($page - 1) * $pageSize;
            $subscriber = $tag->subscriber()->offset($offset)->limit($pageSize)->get();
            return $this->success('', $subscriber);
        }
    }


}