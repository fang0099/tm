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

use Storage;

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

    public function show_edit(Request $request)
    {
        if(session("id")!=null)
        {
            $r = $request->session()->all();
            return view("front/user_edit",["data"=> $r]);
        }
        return redirect("/login");

    }

    public function update(Request $request)
    {
        if(session("username")!=null) {
            $r = $request->session()->all();
            $id = $r["id"];
            $username = $r["username"];
            $password = $r["password"];
            //$avatar = $r["avatar"];
            $brief = $request->get("brief");
            $file = $request->file('avatar');

            if ($file!=null && $file->isValid()) {
                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                // 上传文件
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                var_dump($bool);
                $bool = "/tm/web/storage/app/uploads/".$filename;
            }
            else
            {
                $bool = $r["avatar"];
            }


        $r = $this->userInvoker->update(
            [
                "params[id]"=>$id,
                "params[username]"=>$username,
                "params[password]"=>$password,
                "params[avatar]"=>$bool,
                "params[brief]"=>$brief,
            ]
        );
        $r2 = $this->userInvoker->getbyname(
            ['username'=>$username]
        );

            session($r2["data"]);


            return redirect("/user/profile");
        }
        return redirect("/login");


    }

    public function login()
    {
        if (session("username")!=null)
        {
            return redirect("/index");

        }
        return view("front/user_login");
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect("/index");
    }


    public function signin(Request $request)
    {
        $username = $request->get('username');
        $password=$request->get("password");
        //echo $username;
        $r = $this->userInvoker->getbyname(
            ['username'=>$username]
        );
        $result = Array();
        if (md5($password) == $r["data"]["password"])
        {
            $result["success"] = true;
            $result["message"] = "login success";
            session($r["data"]);
        }
        else
        {
            $result["success"] = false;
            $result["message"] = "login failed";
        }

        echo json_encode($result);
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

        //return redirect("/");
        echo json_encode($r);
    }

    public function user_list()
    {
        $r = $this->userInvoker->list();
        print_r($r);
    }
}