<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-6
 * Time: 下午9:47
 */

namespace App\Repositories;


use App\Model\NewsFlash;
use Illuminate\Http\Request;

class NewsFlashRepository extends BaseRepository
{
    public function __construct(NewsFlash $model)
    {
        $this->model = $model;
    }

    public function create(Request $request){
        $params = $this->getParams($request);
        return $this->insertInternal($params);
    }

    public function update(Request $request){
        $params = $this->getParams($request);
        return $this->updateInternal($params);
    }

    public function delete($ids){
        $idsArr = explode(',', $ids);
        return $this->batchDeleteInternal($idsArr);
    }

    public function list(Request $request){
        return $this->select($request);
    }


}