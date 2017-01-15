<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 17-1-15
 * Time: 下午4:00
 */

namespace App\Repositories;


use App\Model\Draft;
use Illuminate\Http\Request;

class DraftRepository extends BaseRepository
{
    public function __construct(Draft $model)
    {
        $this->model = $model;
    }
    public function findById($id){
        return $this->getById($id);
    }

    public function insert(Request $request){
        $params = $this->getParams($request);
        return $this->insertInternal($params);
    }

    public function update(Request $request){
        $params = $this->getParams($request);
        return $this->updateInternal($params);
    }

    public function delete($id){
        return $this->deleteById($id);
    }

    public function deleteByUid($id, $uid){
        $draft = $this->get($id);
        if($draft && $draft->author_id == $uid){
            $draft->del_flag = 1;
            $draft->save();
            return $this->success();
        }else {
            return $this->fail('');
        }
    }

    public function batchDelete($ids){
        $idsArr = explode(',', $ids);
        return $this->batchDeleteInternal($idsArr);
    }
}