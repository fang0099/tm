<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午9:53
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FriendLinkRepository;

class FriendLinkController extends Controller
{
    private $friendLinkRep;

    public function __construct(FriendLinkRepository $friendLinkRep){
        $this->friendLinkRep = $friendLinkRep;
    }

    public function get($id){
        return $this->friendLinkRep->findById($id);
    }

    public function list(Request $request){
        return $this->friendLinkRep->select($request);
    }

    public function create(Request $request){
        return $this->friendLinkRep->insert($request);
    }

    public function update(Request $request){
        return $this->friendLinkRep->update($request);
    }

    public function delete($ids){
        $idsArr = explode(',', $ids);
        return $this->friendLinkRep->batchDelete($idsArr);
    }
}