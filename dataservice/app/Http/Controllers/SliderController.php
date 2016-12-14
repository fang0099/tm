<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-14
 * Time: 下午10:49
 */

namespace App\Http\Controllers;


use App\Repositories\SliderRepository;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    private $sliderRep;
    public function __construct(SliderRepository $sliderRep)
    {
        $this->sliderRep = $sliderRep;
    }

    public function get(Request $request){
        $id = $request->input('id');
        return $this->sliderRep->findById($id);
    }

    public function create(Request $request){
        return $this->sliderRep->create($request);
    }

    public function list(){
        return $this->sliderRep->list();
    }

    public function delete(Request $request){
        $ids = $request->input('ids');
        return $this->sliderRep->delete($ids);
    }

    public function update(Request $request){
        return $this->sliderRep->update($request);
    }
}