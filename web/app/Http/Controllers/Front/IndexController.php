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

class IndexController extends Controller
{
    private $articleInvoker;
    private $userInvoker;
    private $webInfoInvoker;

    public function __construct(ArticleInvoker $articleInvoker)
    {
        $this->articleInvoker = $articleInvoker;
    }

    public function index(){
        //$r = $this->articleInvoker->get(['id' => 1]);
        //print_r($r);
        return view("front/index");
    }

}