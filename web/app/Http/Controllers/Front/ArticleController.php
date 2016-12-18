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
        return view("front/article",['article' => $r["data"],
            'recent_article_list' => $article_list["data"]
        ]);
    }

    public function article()
    {

    }

    public function like_article(Request $request)
    {

    }

    public function unlike_article(Request $request)
    {

    }

    public function collect_article(Request $request)
    {

    }

    public function uncollect_article(Request $request)
    {

    }

    public function edit_article(Request $request)
    {
        $id = $request->get("id");
        $r = $this->articleInvoker->get(['id'=>$id]);
        return view("front/article_update", ['article'=>$r["data"]]);
    }

    public function update(Request $request)
    {
        $id = $request->get("id");
        $title = $request->get("title");
        $content = $request->get("content");

        $face = "123";
        $abstracts = "abstract";
        $tags = 1;
        echo $id;
        $r = $this->articleInvoker->update(
            [
                'params[id]' => $id ,
                'params[title]' => $title ,
                'params[face]' => $face,
                'params[abstracts]'=>$abstracts,
                'params[content]'=>$content,
                //'params[author]'=>$author,
                'params[tags]'=>$tags
            ]);

        print_r($r);
    }

    public function delete(Request $request)
    {
        $id = $request->get("id");
        $id = (string)$id;
        $r = $this->articleInvoker->delete(
          [
              'ids'=>$id,
          ]
        );
        print_r($r);
        //return redirect("/");
    }

    public function create(Request $request)
    {
        $title = $request->get("title");
        $content = $request->get("content");

        $face = "123";
        $abstracts = "abstract";
        $author = session("id");
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
        if (session("username")!=null) {
            return view("front/write_article");
        }
        else
        {
            return redirect('/login');
        }
    }

    public function article_list()
    {
        $r = $this->articleInvoker->list();
        return view("front/article_list", ['people'=> $r["data"]["list"]]);
    }
}