<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-7
 * Time: 下午11:01
 */

namespace App\Repositories;


use App\Model\Notice;
use Illuminate\Http\Request;

class NoticeRepository extends BaseRepository
{
    public function __construct(Notice $model)
    {
        $this->model = $model;
    }

    public function create(Request $request){
        return $this->insertInternal($this->getParams($request));
    }

    public function update(Request $request){
        return $this->updateInternal($this->getParams($request));
    }

    public function list(Request $request){
        return $this->select($request);
    }

    public function delete($ids){
        $idsArr = explode(',', $ids);
        return $this->batchDeleteInternal($idsArr);
    }


}