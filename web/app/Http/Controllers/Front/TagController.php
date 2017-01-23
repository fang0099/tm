<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-8
 * Time: 下午9:40
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Invokers\TagInvoker;
use Illuminate\Http\Request;

use Storage;

class TagController extends Controller
{
    private $tagInvoker;

    public function __construct(TagInvoker $tagInvoker)
    {
        $this->tagInvoker = $tagInvoker;
    }

    public function index(Request $request)
    {
        $id = $request->get("id");
        $r = $this->tagInvoker->get(['id'=>$id]);

        $article_list = $this->tagInvoker->articles(['id'=>$id]);
        return view("front/article_list",
            ['people'=> $article_list["data"]
        ]);
        print_r($r);
    }

    public function subscribe(Request $request)
    {
        $id = $request->get("id");
        if(session("username")!=null)
        {
            $r = $this->tagInvoker->subscribe(['id'=>$id, 'userid'=> session('id')]);
            return redirect("article/list?type=tag&id=".$id);
        }
        else
        {
            return redirect('/account#login');
        }

    }

    public function unsubscribe(Request $request)
    {
        $id = $request->get("id");
        if(session("username")!=null)
        {
            $r = $this->tagInvoker->unsubscribe(['id'=>$id, 'userid'=> session('id')]);
            return redirect("article/list?type=tag&id=".$id);
        }
        else
        {
            return redirect('/account#login');
        }

    }

    public function subscribe_ajax(Request $request)
    {
        $id = $request->get("id");
        if(session("username")!=null)
        {
            $r = $this->tagInvoker->subscribe(['id'=>$id, 'userid'=> session('id')]);
            return json_encode($r);
            //return redirect("article/list?type=tag&id=".$id);
        }
        else
        {
            return redirect('/account#login');
        }

    }

    public function unsubscribe_ajax(Request $request)
    {
        $id = $request->get("id");
        if(session("username")!=null)
        {
            $r = $this->tagInvoker->unsubscribe(['id'=>$id, 'userid'=> session('id')]);
            return json_encode($r);
            //return redirect("article/list?type=tag&id=".$id);
        }
        else
        {
            return redirect('/account#login');
        }

    }

    public function tag_article_list(Request $request)
    {

    }

    public function article_list(Request $request)
    {

    }

    public function show_edit(Request $request)
    {
        $id = $request->get("id");
        $tag = $this->tagInvoker->get(['id'=>$id]);
        $menu_tags = $this->tagInvoker->list();
        $this->tagInvoker->get(["id"=>$id]);
        return view("front/tag_edit",
            [
                'tag' => $tag["data"],
                'menu_tags'=>$menu_tags["list"],
            ]);
    }

    public function update(Request $request)
    {
        if(session("username")!=null)
        {
            $id = $request->get("id");
            $name = $request->get("name");
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
                $bool = "";
            }

            $face = $bool;
            $creator = session("id");
            $brief = $request->get("brief");

            $params = [
                'params[id]'=>$id,
                'params[name]' => $name,

                'params[creator]' => $creator,
                'params[brief]' => $brief,
            ];
            if ($face != "")
            {
                $params["params[face]"] = $face;
            }

            $r = $this->tagInvoker->update(
                $params
            );
            return redirect("/tag/edit?id=".$id);
        }

        return redirect("/index");
    }

    public function show_create()
    {
        $menu_tags = $this->tagInvoker->list();
        return view("front/tag_create",
            [
                'menu_tags'=>$menu_tags["list"],
            ]);
    }

    public function show_subscribers_list(Request $request)
    {
        $page_class = "age-post-voters";
        $id = $request->get('id');
        $tag = $this->tagInvoker->get(['id'=>$id]);
        //print_r($tag);
        $users = $this->tagInvoker->subscriber(['id'=>$id]);
        //print_r($users);
        //return;
        $params = ["page_class"=>$page_class, "users"=>$users["data"], 'tag'=>$tag["data"]];
        $username = session("username");
        if($username!=null)
        {
            $params["username"] = $username;
        }
        return view("front/user_list", $params);
    }

    public function create(Request $request)
    {
        if(session("username")!=null)
        {
            $name = $request->get("name");
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
                $bool = "";
            }

            $face = $bool;
            $creator = session("id");
            $brief = $request->get("brief");

            $r = $this->tagInvoker->create(
                ['params[name]' => $name,
                    'params[face]' => $face,
                    'params[creator]' => $creator,
                    'params[brief]' => $brief,
                ]);
        }

        return redirect("/index");

    }

    public function tag_list()
    {
        $r = $this->tag->list();
        print_r($r);
    }
}