<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-7
 * Time: 下午11:28
 */

namespace App\Http\Controllers;


use app\Repositories\OptLogRepository;
use Illuminate\Http\Request;

class OptLogController extends Controller
{
    private $optLogRep;
    public function __construct(OptLogRepository $optLogRep)
    {
        $this->optLogRep = $optLogRep;
    }

    public function get(Request $request){
        $id = $request->input('id');
        return $this->optLogRep->getById($id);
    }

    public function create(Request $request){
        return $this->optLogRep->create($request);
    }

    public function update(Request $request){
        return $this->optLogRep->update($request);
    }

    public function delete(Request $request){
        $ids = $request->input('ids');
        $idsArr = explode(',', $ids);
        return $this->optLogRep->batchDeleteInternal($idsArr);
    }
}