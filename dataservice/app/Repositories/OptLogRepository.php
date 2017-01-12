<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-7
 * Time: 下午11:17
 */

namespace app\Repositories;


use App\Model\OptLog;

class OptLogRepository extends BaseRepository
{
    public function __construct(OptLog $model)
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
}