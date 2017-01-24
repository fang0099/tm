<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-4
 * Time: 下午10:53
 */

namespace App\Repositories;

use App\Events\SubscribeTagEvent;
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
        $tag = $this->get($id);
        if($tag == null || $tag->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'tag is not exist', ['id'=>$id]);
        }
        return $this->success('', $tag);
    }

    /*
    public function page(Request $request){
        return $this->success('', $this->page($request));
    }
    */

    public function create(Request $request){
        $params = $this->getParams($request);
        $params['has_checked'] = 0;
        $params['checker'] = 0;
        //$params['fans_num'] = 0;
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
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'tag is not exist', ['id'=>$id, 'operator'=>$subscriber]);
        }
        else {
            $count = DB::select('select count(*) as c from tag_subscriber where subscriber_id = ? and tag_id = ?', [$subscriber, $id]);
            $c = $count[0]->c;
            if($c == 0){
                DB::insert('insert into tag_subscriber (subscriber_id, tag_id) values (?, ?)', [$subscriber, $id]);
                $tag->fans_num = $tag->fans_num + 1;
                $tag->save();
            }
            event(new SubscribeTagEvent($tag, $subscriber));
            return $this->success();
        }
    }

    public function unsubscribe($id, $subscriber){
        $tag = $this->get($id);
        if($tag == null || $tag->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'tag is not exist', ['id'=>$id, 'operator'=>$subscriber]);
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

    public function articles($id, $order, $page){
        $tag = $this->get($id);
        if($tag == null || $tag->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'tag is not exist', ['id'=>$id]);
        }
        else {
            $pageSize = 10;
            $offset = ($page - 1) * $pageSize;
            $articles = $tag->articles()->orderBy($order, 'desc')->offset($offset)->limit($pageSize)->get();
            return $this->success('', $articles);
        }
    }

    

    public function subscriber($id, $page){
        $tag = $this->get($id);
        if($tag == null || $tag->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'tag is not exist', ['id'=>$id]);
        }
        else {
            $pageSize = 15;
            $offset = ($page - 1) * $pageSize;
            $subscriber = $tag->subscriber()->offset($offset)->limit($pageSize)->get();
            return $this->success('', $subscriber);
        }
    }

    public function hasSubscribe($id, $userId){
        $tag = $this->get($id);
        if($tag == null || $tag->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'tag is not exist', ['id'=>$id, 'operator'=>$userId]);
        }
        else {
            $count = DB::select('select count(*) as c from tag_subscriber where subscriber_id = ? and tag_id = ?', [$userId, $id]);
            $c = $count[0]->c;
            if ($c > 0) {
                return $this->success();
            }
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL);
        }
    }

    public function menuTags($size){
        $tags = $this->model->where('show_menu', '=', '1')->where('del_flag', '=', 0)->orderBy('sorted')->take($size)->get();
        return $this->success('', $tags);
    }

    public function indexTags($size){
        $tags = $this->model->where('show_index', '=', '1')->orderBy('fans_num', 'DESC')->where('del_flag', '=', 0)->take($size)->get();
        return $this->success('', $tags);
    }

}