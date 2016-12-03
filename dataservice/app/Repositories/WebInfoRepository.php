<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 上午9:06
 */

namespace App\Repositories;


use App\Model\WebInfo;
use Illuminate\Http\Request;
use App\StatusCode;

class WebInfoRepository extends BaseRepository
{

    public function __construct(WebInfo $model)
    {
        $this->model = $model;
    }

    public function update(Request $request){
        $params = $this->getParams($request);
        return $this->updateInternal($params);
    }


}