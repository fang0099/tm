<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-8
 * Time: 下午9:40
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Invokers\TagInvoker;
use App\Invokers\UserInvoker;
use App\Invokers\WebInfoInvoker;
use App\Invokers\ArticleInvoker;

class IndexController extends Controller
{
    private $articleInvoker;
    private $userInvoker;
    private $webInfoInvoker;
    private $tagInvoker;

    //初始化
    public function __construct(ArticleInvoker $articleInvoker,
                                UserInvoker $userInvoker,
                                WebInfoInvoker $webInfoInvoker,
                                TagInvoker $tagInvoker
                                )
    {
        $this->articleInvoker = $articleInvoker;
        $this->userInvoker = $userInvoker;
        $this->webInfoInvoker = $webInfoInvoker;
        $this->tagInvoker = $tagInvoker;
    }

    //首页
    //TODO 修改幻灯，置顶文章
    public function show_index()
    {
        $article_list = $this->articleInvoker->list(["order"=>'publish_time desc']);
        $slider_article_list = $this->articleInvoker->list(["order"=>'publish_time desc','pageSize'=>3]);
        $second_article_list = $this->articleInvoker->list(["order"=>'publish_time desc','pageSize'=>3]);

        $menu_tags = $this->tagInvoker->list();

        return view("front/index", [
            'articles'=> $article_list["data"]["list"],
            'slider_article_list' => $slider_article_list["data"]["list"],
            'second_article_list' => $second_article_list["data"]["list"],
            'menu_tags'=>$menu_tags["list"],
        ]);
    }

}