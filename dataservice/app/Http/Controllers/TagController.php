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

    }

    public function create(Request $request){

    }

    public function update(Request $request){

    }

    public function list(Request $request){

    }

    public function delete($ids){

    }

    public function subscribe($id, $userid){

    }

    public function unsubcribe($id, $userid){

    }
}