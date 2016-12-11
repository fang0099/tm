<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-8
 * Time: 下午9:40
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Invokers\FriendLinkInvoker;
use App\Invokers\UserInvoker;
use App\Invokers\WebInfoInvoker;
use App\Invokers\ArticleInvoker;

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
    }

    public function create()
    {
        $title = "test";
        $face="123";
        $abstracts="abstract";
        $content="dsajifsjaiof";
        $author=1;
        $tags="fff";
        $r = $this->articleInvoker->create(
            ['title' => $title ,
            'face' => $face,
            'abstracts'=>$abstracts,
            'content'=>$content,
            'author'=>$author,
            'tags'=>$tags
        ]);

        print_r($r);
    }

    public function article_list()
    {
        $r = $this->articleInvoker->list();
        print_r($r);
    }
}