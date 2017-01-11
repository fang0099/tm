<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 17-1-10
 * Time: 下午9:28
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Invokers\UserInvoker;
use Illuminate\Http\Request;

class UserCenterController extends Controller
{

    private $userInvoker;

    public function __construct(UserInvoker $userInvoker)
    {
        $this->userInvoker = $userInvoker;
    }

    public function index(){
        $uid = session('id', 1);
        $user = $this->userInvoker->get(['id' => $uid]);
        return view('front/user_center', $user['data']);
    }

    public function activities($page){
        $uid = session('id', 1);
        $result = $this->userInvoker->activities(['userid'=>$uid, 'page'=>$page]);
        if($result['success']){
            return $this->jsonResult(true, '', $result['data']);
        }else {
            return $this->jsonResult(true, $result['message'], []);
        }
    }

    public function notices($page){
        $uid = session('id', 1);
        $result = $this->userInvoker->notice(['userid'=>$uid, 'page'=>$page]);
        if($result['success']){
            return $this->jsonResult(true, '', $result['data']);
        }else {
            return $this->jsonResult(true, $result['message'], []);
        }
    }

    public function articles($type, $page){
        $uid = session('id',1);
        $method = 'articles' . $type;
        $result = $this->userInvoker->$method(['id'=>$uid,'userid' => $uid, 'page'=>$page]);
        if($result['success']){
            return $this->jsonResult(true, '', $result['data']);
        }else {
            return $this->jsonResult(true, $result['message'], []);
        }
    }

    public function subscribe($page){
        $uid = session('id', 1);
        $result = $this->userInvoker->tags(['id'=>$uid, 'page'=>$page]);
        if($result['success']){
            return $this->jsonResult(true, '', $result['data']);
        }else {
            return $this->jsonResult(true, $result['message'], []);
        }
    }

    public function follows($page){
        $uid = session('id');
        $result = $this->userInvoker->follows(['id'=>$uid, 'page'=>$page]);
        if($result['success']){
            return $this->jsonResult(true, '', $result['data']);
        }else {
            return $this->jsonResult(true, $result['message'], []);
        }
    }

    public function followers($page){
        $uid = session('id');
        $result = $this->userInvoker->followers(['id'=>$uid, 'page'=>$page]);
        if($result['success']){
            return $this->jsonResult(true, '', $result['data']);
        }else {
            return $this->jsonResult(true, $result['message'], []);
        }
    }

    public function info(){
        //$user = $this->userInvoker->get(['id'=>1]);
        //session($user['data']);
        $info = [
            'id' => session('id'),
            'username' => session('username'),
            'brief' => session('brief'),
            'qq' => session('qq'),
            'weibo' => session('weibo'),
            'weixin' => session('weixin')
        ];
        return $this->jsonResult(true, '', [$info]);
    }

    public function updateInfo(Request $request){
        $params = $request->all();
        $data = $this->userInvoker->update($params);
        if ($data['success']){
            return ['success' => 'true'];
        }else {
            return ['success' => 'false', 'message' => $data['message']];
        }
    }
}