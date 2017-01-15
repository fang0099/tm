<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 17-1-10
 * Time: 下午9:28
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Invokers\ArticleInvoker;
use App\Invokers\NoticeInvoker;
use App\Invokers\TagInvoker;
use App\Invokers\UserInvoker;
use Illuminate\Http\Request;

class UserCenterController extends Controller
{

    private $userInvoker;
    private $tagInvoker;
    private $noticeInvoker;
    private $articleInvoker;

    public function __construct(ArticleInvoker $articleInvoker, UserInvoker $userInvoker, TagInvoker $tagInvoker, NoticeInvoker $noticeInvoker)
    {
        $this->articleInvoker = $articleInvoker;
        $this->userInvoker = $userInvoker;
        $this->tagInvoker = $tagInvoker;
        $this->noticeInvoker = $noticeInvoker;
    }

    public function index(){
        $uid = session('id', 1);
        $user = $this->userInvoker->get(['id' => $uid]);

        return view('front/user_center_v2', $user['data']);
    }

    public function activities($page = 1){
        $uid = session('id', 1);
        $result = $this->userInvoker->activities(['userid'=>$uid, 'page'=>$page]);
        if($result['success']){
            return $this->jsonResult(true, '', $result['data']);
        }else {
            return $this->jsonResult(true, $result['message'], []);
        }
    }

    public function notices($page = 1){
        $uid = session('id', 1);
        $result = $this->userInvoker->notice(['userid'=>$uid, 'page'=>$page]);
        if($result['success']){
            return $this->jsonResult(true, '', $result['data']);
        }else {
            return $this->jsonResult(true, $result['message'], []);
        }
    }

    public function articles($type, $page = 1){
        $uid = session('id',1);
        $method = 'articles' . $type;
        $result = $this->userInvoker->$method(['id'=>$uid,'userid' => $uid, 'page'=>$page]);
        if($result['success']){
            $data = isset($result['data']) ? $result['data'] : (isset($result['list']) ? $result['list'] : []);
            return $this->jsonResult(true, '', $data);
        }else {
            return $this->jsonResult(true, $result['message'], []);
        }
    }

    public function subscribe($page = 1){
        $uid = session('id', 1);
        $result = $this->userInvoker->tags(['id'=>$uid, 'page'=>$page]);
        if($result['success']){
            return $this->jsonResult(true, '', $result['data']);
        }else {
            return $this->jsonResult(true, $result['message'], []);
        }
    }

    public function follows($page = 1){
        $uid = session('id');
        $result = $this->userInvoker->follows(['id'=>$uid, 'page'=>$page]);
        if($result['success']){
            return $this->jsonResult(true, '', $result['data']);
        }else {
            return $this->jsonResult(true, $result['message'], []);
        }
    }

    public function followers($page = 1){
        $uid = session('id');
        $result = $this->userInvoker->followers(['id'=>$uid, 'page'=>$page]);
        if($result['success']){
            return $this->jsonResult(true, '', $result['data']);
        }else {
            return $this->jsonResult(true, $result['message'], []);
        }
    }

    public function info(){
        $user = $this->userInvoker->get(['id'=>25]);
        session($user['data']);
        $info = [
            'id' => session('id'),
            'username' => session('username'),
            'brief' => session('brief'),
            'qq' => session('qq'),
            'weibo' => session('weibo'),
            'weixin' => session('weixin'),
            'avatar' => session('avatar')
        ];
        return $this->jsonResult(true, '', $user['data']);
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

    public function update(Request $request){
        $id = session('id', 1);
        $name = $request->input('name');
        $value = $request->input('value');
        $params = [
            'params[id]' => $id,
            $name => $value
        ];
        $data = $this->userInvoker->update($params);
        if ($data['success']){
            return ['success' => 'true'];
        }else {
            return ['success' => 'false', 'message' => $data['message']];
        }
    }

    public function unsubscribe($id){
        $uid = session('id', 1);
        $data = $this->tagInvoker->unsubscribe(["id" => $id, "userid" => $uid]);
        if ($data['success']){
            return ['success' => 'true'];
        }else {
            return ['success' => 'false', 'message' => $data['message']];
        }
    }

    public function unfollow($id){
        $follower = session('id', 1);
        $data = $this->userInvoker->unfollow(["id" => $id, "follower" => $follower]);
        if ($data['success']){
            return ['success' => 'true'];
        }else {
            return ['success' => 'false', 'message' => $data['message']];
        }
    }
    public function deleteNotice($id){
        $data = $this->noticeInvoker->delete(["id" => $id]);
        if ($data['success']){
            return ['success' => 'true'];
        }else {
            return ['success' => 'false', 'message' => $data['message']];
        }
    }

    public function uncollect($id){
        $uid = session('id', 1);
        $data = $this->articleInvoker->uncollect(["id" => $id, "userid" => $uid]);
        if ($data['success']){
            return ['success' => 'true'];
        }else {
            return ['success' => 'false', 'message' => $data['message']];
        }
    }

    public function delDraft($id){
        $uid = session('id');
        $data = $this->userInvoker->deldraft(["id" => $id, "userid" => $uid]);
        if ($data['success']){
            return ['success' => 'true'];
        }else {
            return ['success' => 'false', 'message' => $data['message']];
        }
    }

    public function delArticle($id){
        $uid = session('id');
        $data = $this->userInvoker->delarticle(["id" => $id, "userid" => $uid]);
        if ($data['success']){
            return ['success' => 'true'];
        }else {
            return ['success' => 'false', 'message' => $data['message']];
        }
    }
}