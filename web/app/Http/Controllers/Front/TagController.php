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
use App\Invokers\WebInfoInvoker;
use App\Invokers\UserInvoker;

class UserController extends Controller
{
    private $userInvoker;

    public function __construct(UserInvoker $userInvoker)
    {
        $this->userInvoker = $userInvoker;
    }

    public function index(){
        $r = $this->userInvoker->get(['id' => 1]);
        print_r($r);
    }

    public function create()
    {
        $username = "test";
        $password="123456";
        $avatar="abstract";
        $brief="dsajifsjaiof";

        $r = $this->userInvoker->create(
            ['username' => $username,
            'password' => $password,
            'avatar'=>$avatar,
            'brief'=>$brief,
        ]);

        print_r($r);
    }

    public function user_list()
    {
        $r = $this->user->list();
        print_r($r);
    }
}