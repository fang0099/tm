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
use App\Invokers\TagInvoker;

class TagController extends Controller
{
    private $userInvoker;

    public function __construct(TagInvoker $tagInvoker)
    {
        $this->tagInvoker = $tagInvoker;
    }

    public function index()
    {
        $r = $this->tagInvoker->get(['id' => 1]);
        print_r($r);
    }

    public function create()
    {
        $username = "test";
        $face="123456";
        $creator=1;
        $brief="dsajifsjaiof";

        $r = $this->tagInvoker->create(
            ['username' => $username,
            'face' => $face,
            'creator'=>$creator,
            'brief'=>$brief,
        ]);

        print_r($r);
    }

    public function tag_list()
    {
        $r = $this->tag->list(['id'=>1]);
        print_r($r);
    }
}