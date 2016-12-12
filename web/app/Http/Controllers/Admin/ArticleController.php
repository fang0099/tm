<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-13
 * Time: 上午12:41
 */

namespace App\Http\Controllers\Admin;


use App\Invokers\ArticleInvoker;
use Illuminate\Http\Request;

class ArticleController extends AdminBaseController
{
    private $invoker;
    public function __construct(ArticleInvoker $invoker)
    {
        $this->invoker = $invoker;
    }

    public function list(Request $request){
        $res = $this->invoker->list($request->input('params'));
        if($res['success']){
            $res = $res['data'];
            if(isset($res['list'])){
                $res = $res['list'];
            }else {
                $res = [];
            }
        }else {
            $res = [];
        }
        return view('article-list', ['list' => $res]);
    }

}