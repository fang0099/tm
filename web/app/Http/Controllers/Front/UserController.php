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
use App\Invokers\FriendLinkInvoker;
use App\Invokers\WebInfoInvoker;
use App\Invokers\UserInvoker;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userInvoker;
    private $articleInvoker;

    public function __construct(UserInvoker $userInvoker, ArticleInvoker $articleInvoker)
    {
        $this->userInvoker = $userInvoker;
        $this->articleInvoker = $articleInvoker;
    }

    public function index(Request $request){
        $id = $request->get('id');
        $r = $this->userInvoker->get(['id' => $id]);

        $user_article = $this->userInvoker->lastedarticles(['userid'=>$id]);
        print_r($r);
        print_r($user_article);
    }

    public function login()
    {
        return view("front/user_login");
    }

    public function signin()
    {

    }

    public function signup()
    {
        return view("front/user_signup");
    }

    public function create(Request $request)
    {
        $username = $request->get('username');
        $password=$request->get("password");
        $avatar="/tm/web/resources/assets/img/user.png";
        $brief="这家伙很懒，什么也没留下";

        $r = $this->userInvoker->create(
            ['params[username]' => $username,
            'params[password]' => $password,
            'params[avatar]'=>$avatar,
            'params[brief]'=>$brief,
        ]);

        print_r($r);
    }

    public function user_list()
    {
        $r = $this->userInvoker->list();
        print_r($r);
    }
}