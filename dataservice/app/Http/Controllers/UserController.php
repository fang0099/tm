<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-5
 * Time: 下午6:12
 */

namespace App\Http\Controllers;


use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRep;

    public function __construct(UserRepository $userRep)
    {
        $this->userRep = $userRep;
    }

    public function get($id){
        return $this->userRep->findById($id);
    }

    public function create(Request $request){
        return $this->userRep->create($request);
    }

    public function update(Request $request){
        return $this->userRep->update($request);
    }

    public function delete($ids){
        return $this->userRep->delete($ids);
    }

    public function list(Request $request){
        return $this->userRep->list($request);
    }

    public function followers($id, $page = 1){
        return $this->userRep->followers($id, $page);
    }
}