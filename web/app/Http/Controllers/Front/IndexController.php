<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-8
 * Time: 下午9:40
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Invokers\SliderInvoker;
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
    private $sliderInvoker;

    //初始化
    public function __construct(ArticleInvoker $articleInvoker,
                                UserInvoker $userInvoker,
                                WebInfoInvoker $webInfoInvoker,
                                TagInvoker $tagInvoker,
                                SliderInvoker $sliderInvoker
                                )
    {
        $this->articleInvoker = $articleInvoker;
        $this->userInvoker = $userInvoker;
        $this->webInfoInvoker = $webInfoInvoker;
        $this->tagInvoker = $tagInvoker;
        $this->sliderInvoker = $sliderInvoker;
    }

    public function show_index()
    {
        $page_class = "home";
        $username = session("username");
        $article_list = $this->articleInvoker->list(["order"=>'publish_time desc','pageSize'=>6]);
        $user_list = $this->userInvoker->list(['pageSize'=>8]);

        $params = ['page_class'=>$page_class,
            'articles'=>$article_list["data"]["list"],
            'users'=>$user_list["list"]
        ];
        if ($username!=null)
        {
            $params["username"] = $username;
        }
        return view("front/index", $params);
    }

}