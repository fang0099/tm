<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 17-1-15
 * Time: 下午3:58
 */

namespace App\Http\Controllers;


use App\Repositories\DraftRepository;
use Illuminate\Http\Request;

class DraftController extends Controller
{
    private $draftRep;
    public function __construct(DraftRepository $draftRep)
    {
        $this->draftRep = $draftRep;
    }

    public function create(Request $request){
        return $this->draftRep->insert($request);
    }

    public function getById(Request $request){
        return $this->draftRep->getById($request->input('id'));
    }

    public function update(Request $request){
        return $this->draftRep->update($request);
    }

    public function delete(Request $request){
        $ids = $request->input('ids');
        return $this->draftRep->batchDelete($ids);
    }
}