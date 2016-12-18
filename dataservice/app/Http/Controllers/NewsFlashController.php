<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-6
 * Time: 下午9:53
 */

namespace App\Http\Controllers;


use App\Repositories\NewsFlashRepository;
use Illuminate\Http\Request;

class NewsFlashController extends Controller
{
    private $newsFlashRep;

    public function __construct(NewsFlashRepository $newsFlashRep)
    {
        $this->newsFlashRep = $newsFlashRep;
    }

    public function get(Request $request){
        $id = $request->input('id');
        return $this->newsFlashRep->getById($id);
    }

    public function create(Request $request){
        return $this->newsFlashRep->create($request);
    }

    public function update(Request $request){
        return $this->newsFlashRep->update($request);
    }

    public function delete(Request $request){
        $ids = $request->input('ids');
        return $this->newsFlashRep->delete($ids);
    }

    public function list(Request $request){
        return $this->newsFlashRep->list($request);
    }
}