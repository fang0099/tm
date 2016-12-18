<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-6
 * Time: 下午10:09
 */

namespace App\Http\Controllers;


use App\Repositories\SponsorsRepository;
use Illuminate\Http\Request;

class SponsorsController extends Controller
{
    private $sponsorsRep;

    public function __construct(SponsorsRepository $sponsorsRep)
    {
        $this->sponsorsRep = $sponsorsRep;
    }

    public function get(Request $request){
        $id = $request->input('id');
        return $this->sponsorsRep->getById($id);
    }

    public function create(Request $request){
        return $this->sponsorsRep->create($request);
    }

    public function update(Request $request){
        return $this->sponsorsRep->update($request);
    }

    public function delete(Request $request){
        $ids = $request->input('ids');
        return $this->sponsorsRep->delete($ids);
    }

    public function list(Request $request){
        return $this->sponsorsRep->list($request);
    }
}