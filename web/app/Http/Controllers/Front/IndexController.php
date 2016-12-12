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

class IndexController extends Controller
{
    private $friendLinkInvoker;

    public function __construct(UserInvoker $friendLinkInvoker)
    {
        $this->friendLinkInvoker = $friendLinkInvoker;
    }

    public function index(){
        return $this->friendLinkInvoker->create(['params[title]'=>'hehe', 'params[url]' => 'http://xxx.com']);
    }
}