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

class IndexController extends Controller
{
    private $userInvoker;

    public function __construct(WebInfoInvoker $userInvoker)
    {
        $this->userInvoker = $userInvoker;
    }

    public function index(){
        $r = $this->userInvoker->get(['id' => 1]);
        print_r($r);
    }
}