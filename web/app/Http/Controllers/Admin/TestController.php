<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-12
 * Time: 下午7:09
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Invokers\ArticleInvoker;
use App\Invokers\TagInvoker;
use App\Invokers\UserInvoker;

class TestController extends Controller
{

    private $invoker;

    public function __construct(TagInvoker $invoker)
    {
        $this->invoker = $invoker;
    }

    public function create(){
        return $this->invoker->create(
            ['params[name]'=>'tag', 'params[creator]' => '1']
        );
    }

    public function delete(){
        return $this->invoker->delete(['ids' => 1]);
    }

    public function lists(){
        return $this->invoker->list();
    }

    public function update(){
        return $this->invoker->update(['params[id]' => '1', 'params[name]'=>'tag1']);
    }

    public function get(){
        //return $this->invoker->followers(['id' => 1]);
        //return $this->invoker->follow(['id' => 1]);
        //return $this->invoker->subscribe(['id' => 1, 'userid' => '1']);
        //return $this->invoker->subscriber(['id' => 1]);
        //return $this->invoker->articles(['id' => 1]);
        //return $this->invoker->unsubscribe(['id' => 1, 'userid' => '1']);
    }

    public function check(){
        return $this->invoker->check(['id' => 1, 'operator'=> '2']);
    }

}