<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-8
 * Time: 下午9:40
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Invokers\ArticleInvoker;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $articleInvoker;

    public function __construct(ArticleInvoker $articleInvoker)
    {
        $this->articleInvoker = $articleInvoker;
    }

    public function index(){
        $r = $this->articleInvoker->get(['id' => 1]);
        print_r($r);
        return view("front/article");
    }

    public function article()
    {

    }

    public function create(Request $request)
    {
        //Request::
        $title = $request->get("title");
        $content = $request->get("content");

        $face = "123";
        $abstracts = "abstract";
        $author = 1;
        $tags = 1;
        $r = $this->articleInvoker->create(
            [
                'params[title]' => $title ,
                'params[face]' => $face,
                'params[abstracts]'=>$abstracts,
                'params[content]'=>$content,
                'params[author]'=>$author,
                'params[tags]'=>$tags
            ]);

        print_r($r);
    }

    public function write()
    {
        return view("front/write_article");
    }

    public function article_list()
    {
        $r = $this->articleInvoker->list();
        return view("front/article_list", ['people'=> $r["data"]["list"]]);
    }
}