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
use Webpatser\Uuid\Uuid;
use Mail;

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
        return redirect("/account#login");

    }

    public function show_subscribers_list(Request $request)
    {
        $page_class = "age-post-voters";
        $id = $request->get('id');
        $the_user = $this->userInvoker->get(['id'=>$id]);
        //print_r($the_user);
        $users = $this->userInvoker->followers(['id'=>$id]);
        //print_r($users);
        //return;
        $params = ["page_class"=>$page_class, "users"=>$users["data"], 'the_user'=>$the_user["data"]];
        $username = session("username");
        if($username!=null)
        {
            $params["username"] = $username;
        }


        return view("front/user_list", $params);
    }

    public function show_likers_list(Request $request)
    {
        $page_class = "age-post-voters";
        $id = $request->get('id');
        $the_user = $this->userInvoker->get(['id'=>$id]);
        //print_r($the_user);
        $users = $this->userInvoker->follows(['id'=>$id]);
        //print_r($users);
        //return;
        $params = ["page_class"=>$page_class, "users"=>$users["data"], 'the_user'=>$the_user["data"]];
        $username = session("username");
        if($username!=null)
        {
            $params["username"] = $username;
        }

        return view("front/user_list", $params);
    }

    public function show_liker_article_list(Request $request)
    {

    }

    public function show_collect_article_list(Request $request)
    {

    }

    public function show_tag_article_list(Request $request)
    {

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
                $bool = env("APP_URL")."/uploads/".$filename;
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
        return redirect("/account#login");


    }

    public function login()
    {
        if (session("username")!=null)
        {
            return redirect("/index");
        }
        return view("front/login");
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect("/index");
    }

    public function follow(Request $request)
    {
        $id = $request->get("id");
        if(session("username")!=null)
        {
            $r = $this->userInvoker->follow(['id'=>$id, 'follower'=> session('id')]);
            //return json_encode($r);
            return redirect("article/list?id=".$id);
        }
        else
        {
            return redirect('/account#login');
        }

    }

    public function follow_ajax(Request $request)
    {
        $id = $request->get("id");
        if(session("username")!=null)
        {
            $r = $this->userInvoker->follow(['id'=>$id, 'follower'=> session('id')]);
            return json_encode($r);
            //return redirect("article/list?id=".$id);
        }
        else
        {
            return json_encode(['success' => false, 'message' => '请先登陆']);
        }

    }

    public function unfollow(Request $request)
    {
        $id = $request->get("id");
        if(session("username")!=null)
        {
            $r = $this->userInvoker->unfollow(['id'=>$id, 'follower'=> session('id')]);
            //return json_encode($r);
            return redirect("article/list?id=".$id);
        }
        else
        {
            return redirect('/account#login');
        }

    }
    public function unfollow_ajax(Request $request)
    {
        $id = $request->get("id");
        if(session("username")!=null)
        {
            $r = $this->userInvoker->unfollow(['id'=>$id, 'follower'=> session('id')]);
            return json_encode($r);
            //return redirect("article/list?id=".$id);
        }
        else
        {
            return json_encode(['success' => false, 'message' => '请先登陆']);
        }

    }

    public function signin(Request $request)
    {
        $email = $request->get('email');
        $password=$request->get("password");

        // validate captcha
        $loginFailedTimes = session('login_failed_times', 0);
        if($loginFailedTimes >= 3){
            $captcha = $request->get('captcha');
            if(!\Mews\Captcha\Facades\Captcha::check($captcha)){
                $loginFailedTimes++;
                session(['login_failed_times' => $loginFailedTimes]);
                echo json_encode(['success' => false, 'message' => '验证码错误', 'login_failed_times' => $loginFailedTimes]);
                return;
            }
        }

        //echo $email;
        $r = $this->userInvoker->getbyemail(
            ['email'=>$email]
        );
        //print_r($r);

        $result = Array();
        if ($r['success'] && md5($password) == $r["data"]["password"])
        {
            $result["success"] = true;
            $result["message"] = "登录成功";
            session(['login_failed_times' => 0]);
            session($r["data"]);
        }
        else
        {
            $result["success"] = false;
            $result["message"] = "您的邮箱或密码错误";
            $loginFailedTimes++;
            session(['login_failed_times' => $loginFailedTimes]);
            $result["login_failed_times"] = $loginFailedTimes;
        }

        echo json_encode($result);
    }

    public function signup()
    {
        return view("front/user_signup");
    }

    public function create(Request $request)
    {
        $email = $request->input('email');
        $username = $request->get('username');
        $password=$request->get("password");
        $avatar="/upload/3bab7c10-d1cc-11e6-a3a8-c93836a12d10.png";

        //$avatar="/resources/assets/img/user.png";
        $brief="这家伙很懒，什么也没留下";

        $r = $this->userInvoker->create(
            [
                'params[email]' => $email,
                'params[username]' => $username,
                'params[password]' => $password,
                'params[avatar]'=>$avatar,
                'params[brief]'=>$brief,
                'params[del_flag]' => 1
            ]
        );
        if(isset($r['success']) && $r['success']){
            // send email    
            session(['email'=>$email]);
            session(['_id' => $r['data']['id']]);
            session(['data'=>$r['data']]);
            $this->sendVerfyMail($email);
        }else {
            echo json_encode($r);    
        }
    }

    public function sendVerfyMail($email){
        $uuid = Uuid::generate();
        $code = substr($uuid, 0, 6);
        session(['code' => $code ]);
        
        Mail::send('mail',['username'=>$email, 'code' => $code], function($message) use ($email) {
            $message ->to($email)->subject('贝塔区块链邮箱验证');
        });
        
        echo json_encode(['success' => true, 'message' => '']);
    }

    public function verify(Request $request){
        $code = $request->input('verifyCode');
        
        if($code == session('code')){
            //update user
            $r = $this->userInvoker->update(
                [
                    'params[id]' => session('_id'),
                    'params[del_flag]' => 0
                ]
            );
            $data = session('data');
            session($data);
            echo json_encode(['success' => true, 'message' => '']);
        }else {
            echo json_encode(['success' => false, 'message' => '邮箱验证失败']);
        }
    }

    public function user_list()
    {
        $r = $this->userInvoker->list();
        print_r($r);
    }


    public function articles($uid, $type, $page = 1){
        $authorR = $this->userInvoker->get(['id' => $uid]);
        if($authorR['success']){
            $author = $authorR['data'];
            //var_dump($author);
            $author['weixin'] = '';
            $author['qq'] = '';
            $author['email'] = '';
            $author['weibo'] = '';
            unset($author['is_admin']);

            $articles = [];
            if($type == 'last'){
                $articles = $this->userInvoker->lastedarticles(['userid'=>$uid, 'page'=>$page]);
            }else {
                $articles = $this->userInvoker->hotestarticles(['userid'=>$uid, 'page'=>$page]);
            }
            
            if(isset($articles['data'])){
                $articles = $articles['data'];
            }
            $hasFollowed = $this->userInvoker->hasfollower(['id' => $author['id'], 'userid' => session('id', -1)]);
            return view('front/author', ['followed' => $hasFollowed['success'], 'page' => $page, 'author' => $author, 'articles'=>$articles, 'type' => $type, 'json' => json_encode($author)]);
        }   
        return view('front/notfound');
    }

}
