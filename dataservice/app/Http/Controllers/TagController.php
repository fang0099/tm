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

    public function get(Request $request){
        $id = $request->input('id');
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

    public function delete(Request $request){
        $ids = $request->input('ids');
        return $this->tagRep->delete($ids);
    }

    public function check(Request $request){
        $id = $request->input('id');
        $operator = $request->input('operator');
        return $this->tagRep->check($id, $operator);
    }

    public function subscribe(Request $request){
        $id = $request->input('id');
        $userid = $request->input('userid');
        return $this->tagRep->subscribe($id, $userid);
    }

    public function unsubscribe(Request $request){
        $id = $request->input('id');
        $userid = $request->input('userid');
        return $this->tagRep->unsubscribe($id, $userid);
    }

    public function articles(Request $request){
        $id = $request->input('id');
        $page = $request->input('page', 1);
        return $this->tagRep->articles($id, $page);
    }


    public function subscriber(Request $request){
        $id = $request->input('id');
        $page = $request->input('page', 1);
        return $this->tagRep->subscriber($id, $page);
    }

    public function menuTags(Request $request){
        $size = $request->input('size', 10);
        return $this->tagRep->menuTags($size);
    }

    public function indexTags(Request $request){
        $size = $request->input('size', 10);
        return $this->tagRep->indexTags($size);
    }
}