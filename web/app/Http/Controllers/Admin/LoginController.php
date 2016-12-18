<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-12
 * Time: 下午11:42
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Invokers\UserInvoker;

class LoginController extends AdminBaseController
{

    private $invoker;

    public function __construct(UserInvoker $invoker)
    {
        $this->invoker = $invoker;
    }

    public function login(){
        return view('admin.login');
    }

    public function dologin($username, $password){
        $user = $this->invoker->getbyname(['username' => $username]);
        if($user['success'] == false || empty($user['data'])){
            return $this->jsonResult(false, 'user dose not exist', []);
        }else {
            $user = $user['data'];
            if(md5($password) == $user['password']){
                return $this->jsonResult(true);
            }else {
                return $this->jsonResult(false, 'invalid pwd');
            }
        }
    }

    public function index(){
        return view('admin.index');
    }

}