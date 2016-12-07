<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-7
 * Time: 下午11:22
 */

namespace App\Http\Controllers;


use App\Repositories\NoticeRepository;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    private $noticeRep;

    public function __construct(NoticeRepository $noticeRep)
    {
        $this->noticeRep = $noticeRep;
    }

    public function get($id){
        return $this->noticeRep->getById($id);
    }

    public function create(Request $request){
        return $this->noticeRep->create($request);
    }

    public function update(Request $request){
        return $this->noticeRep->update($request);
    }

    public function delete($ids){
        $idsArr = explode(',', $ids);
        return $this->noticeRep->batchDeleteInternal($idsArr);
    }
}