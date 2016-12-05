<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-4
 * Time: 下午10:48
 */

namespace App\Http\Controllers;

use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private $tagRep;

    public function __construct(TagRepository $tagRep){
        $this->tagRep = $tagRep;
    }

    public function get($id){
        return $this->tagRep->findById($id);
    }

    public function create(Request $request){
        return $this->tagRep->create($request);
    }

    public function update(Request $request){
        return $this->tagRep->update($request);
    }

    public function list(Request $request){
        return $this->tagRep->list($request);
    }

    public function delete($ids){
        return $this->tagRep->delete($ids);
    }

    public function check($id, $operator){
        return $this->tagRep->check($id, $operator);
    }

    public function subscribe($id, $userid){
        return $this->tagRep->subscribe($id, $userid);
    }

    public function unsubcribe($id, $userid){
        return $this->tagRep->unscribe($id, $userid);
    }

    public function articles($id, $page){
        return $this->tagRep->articles($id, $page);
    }


    public function subscriber($id, $page){
        return $this->tagRep->subscriber($id, $page);
    }
}