<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午8:52
 */

namespace App\Repositories;


use App\Model\FriendLink;
use Illuminate\Http\Request;

class FriendLinkRepository extends BaseRepository
{
    public function __construct(FriendLink $model)
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

    public function batchDelete($ids){
        return $this->batchDeleteInternal($ids);
    }

}