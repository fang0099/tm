<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-6
 * Time: 下午10:09
 */

namespace App\Repositories;


use App\Model\Sponsors;
use Illuminate\Http\Request;

class SponsorsRepository extends BaseRepository
{

    public function __construct(Sponsors $model)
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