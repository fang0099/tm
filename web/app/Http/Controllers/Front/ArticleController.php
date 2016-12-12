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
use App\Invokers\UserInvoker;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $articleInvoker;
    private $userInvoker;

    public function __construct(ArticleInvoker $articleInvoker, UserInvoker $userInvoker)
    {
        $this->articleInvoker = $articleInvoker;
        $this->userInvoker = $userInvoker;
    }

    public function index(Request $request){
        $id = $request->get('id');
        $r = $this->articleInvoker->get(['id' => $id]);

        $authorid = $r["data"]["author"]["id"];
        $article_list = $this->userInvoker->lastedarticles(['userid' =>$authorid]);
//        print_r($r);

       // print_r($article_list);
        return view("front/article",['article' => $r["data"],
                                    'recent_article_list' => $article_list["data"]
        ]);
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