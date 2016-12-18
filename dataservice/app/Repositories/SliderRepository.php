<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-14
 * Time: 下午10:49
 */

namespace App\Repositories;


use App\Model\Slider;
use Illuminate\Http\Request;
use App\StatusCode;

class SliderRepository extends BaseRepository
{
    public function __construct(Slider $model)
    {
        $this->model = $model;
    }

    public function findById($id){
        $s = $this->get($id);
        if($s == null || $s->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'result is null');
        }else {
            $s->article = $s->_article;
            return $this->success('', $s);
        }
    }

    public function create(Request $request){
        $params = $this->getParams($request);
        return $this->insertInternal($params);
    }

    public function list(){
        $sliders = Slider::all();
        foreach ($sliders as $s){
            $article = $s->_article;
            $s->article = $article;
        }
        return $this->success('', $sliders);
    }

    public function delete($ids){
        $idsArr = explode(',', $ids);
        return $this->batchDeleteInternal($idsArr);
    }

    public function update(Request $request){
        $params = $this->getParams($request);
        return $this->updateInternal($params);
    }
}