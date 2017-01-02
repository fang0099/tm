<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Invokers\ArticleInvoker;
use App\Invokers\TagInvoker;
use App\Invokers\UserInvoker;
use Illuminate\Http\Request;

use Storage;

class ArticleController extends Controller
{
    private $articleInvoker;
    private $userInvoker;

    public function __construct(ArticleInvoker $articleInvoker,
                                UserInvoker $userInvoker,
                                TagInvoker $tagInvoker)
    {
        $this->articleInvoker = $articleInvoker;
        $this->userInvoker = $userInvoker;
        $this->tagInvoker = $tagInvoker;
    }

    function substr_cut($str_cut,$length)
    {
        if (strlen($str_cut) > $length)
        {
            for($i=0; $i < $length; $i++)
                if (ord($str_cut[$i]) > 128)    $i++;
            $str_cut = substr($str_cut,0,$i)."..";
        }
        return $str_cut;
    }

    public function comment_article(Request $request)
    {
        if (session("username")!=null) {
            $id = $request->get("id");
            $comment = $request->get("comment-content");
            $r = $this->articleInvoker->comment(
                [
                    'params[article_id]' => $id,
                    'params[content]' => $comment,
                    'params[avatar]' => session("avatar"),
                    'params[username]' => session("username"),
                    'params[user_id]' => (int)session("id"),
                ]);
            return redirect(env("APP_URL")."/article?id=".$id);
        }
        else
        {
            return redirect(env("APP_URL")."/login");
        }
    }

    public function delete_comment(Request $request)
    {
        if (session("username")!=null) {
            $comment_id = $request->get("comment_id");
            $article_id = $request->get("article_id");
            $r = $this->articleInvoker->commentdelete(['comment_id'=>$comment_id, 'article_id'=>$article_id]);

            //print_r($r);
            //return;
            //return json_encode($r);
            return redirect(env("APP_URL")."/article?id=".$article_id);
        }
        else
        {
            $id = $request->get("id");
            return 1;
            //return redirect(env("APP_URL")."/login");
        }
    }

    public function like(Request $request)
    {
        if (session("username")!=null) {
            $id = $request->get("id");
            $userid = session("id");
            $r = $this->articleInvoker->like(
                [
                    'id'=>$id,
                    'userid'=>$userid,
                ]
            );

            return json_encode($r);

            //return redirect(env("APP_URL")."/article?id=".$id);
        }
        else{


            //return redirect("login");
        }
    }

    public function unlike(Request $request)
    {
        if (session("username")!=null) {
            $id = $request->get("id");
            $userid = session("id");
            $r = $this->articleInvoker->unlike(
                [
                    'id'=>$id,
                    'userid'=>$userid,
                ]
            );
            return json_encode($r);

        }
        else{
            //return redirect("login");
        }
    }

    public function collect(Request $request)
    {
        if (session("username")!=null) {
            $id = $request->get("id");
            $userid = session("id");
            $r = $this->articleInvoker->collect(
                [
                    'id'=>$id,
                    'userid'=>$userid,
                ]
            );
            return json_encode($r);

            //return redirect(env("APP_URL")."/article?id=".$id);

        }
        else{
            //return redirect("login");
        }
    }

    public function uncollect(Request $request)
    {
        if (session("username")!=null) {
            $id = $request->get("id");
            $userid = session("id");
            $r = $this->articleInvoker->uncollect(
                [
                    'id'=>$id,
                    'userid'=>$userid,
                ]
            );
            return json_encode($r);
            //return redirect(env("APP_URL")."/article?id=".$id);
        }
        else{
            //return redirect("login");
        }
    }

    public function like_user_list(Request $request)
    {
        $page_class = "age-post-voters";
        return view("front/user_list", ["page_class"=>$page_class]);
    }

    public function ajax_article_list(Request $request)
    {
        $page = $request->get("page");
        if($page == null)
        {
            $page = 1;
        }
        $articles = $this->articleInvoker->page(['pageSize'=>6, 'page'=>$page]);

        return json_encode($articles);
    }

    public function ajax_comment_list(Request $request)
    {
        $article_id = $request->get("article_id");
        $page = $request->get("page");
        if ($page == null)
        {
            $page = 1;
        }
        $comments = $this->articleInvoker->lscomment(['pageSize'=>6, 'page'=>$page]);
    }

    public function show_user_list()
    {
        $page_class = "";
        $username = session("username");
        $user_list = $this->userInvoker->list(['pageSize'=>50]);
        //print_r($article_list);
        $params = ['page_class'=>$page_class,
            'users'=>$user_list["list"]
        ];
        if ($username!=null)
        {
            $params["username"] = $username;
        }
        return view("front/user_list", $params);

    }
    //修改文章页／新建文章页
    public function show_edit(Request $request)
    {
        if (session("username")!=null) {
            $username = session("username");
            $userid = session("id");
            //控制样式
            $page_class = "page-write";
            $article_id = $request->get('id');
            $article = $this->articleInvoker->get(['id'=>$article_id]);
            $author_id = $article["data"]["author"]["id"];

            $tags = $this->tagInvoker->list();

            //print_r($tags);
            //return;
            //print_r($article);
            if ($author_id == $userid)
            {
                return view("front/edit", ['page_class' => $page_class, 'username'=>$username, 'article'=>$article, 'tags'=>$tags["list"]]);
            }
            return view("front/edit", ['page_class' => $page_class, 'username'=>$username, 'tags'=>$tags["list"]]);
        }
        //未登录
        else
        {
            return redirect("login");
        }
    }
    //文章详情页
    public function show_article(Request $request)
    {
        $page_class = "page-post-view";
        $username = session("username");
        $id = $request->get('id');
        if($id==null)
        {
            return redirect("index");
        }
        $r = $this->articleInvoker->get(['id' => $id]);
        //print_r($r);
        $authorid = $r["data"]["author"]["id"];
        $article_list = $this->userInvoker->lastedarticles(['userid' =>$authorid, 'pageSize'=>4]);
        //print_r($article_list);
        $comment_list = $this->articleInvoker->lscomment(['id'=>$id]);
        //print_r($comment_list);
        //return;
        return view("front/article",
            [
                'article' => $r["data"],
                'recent_article_list' => $article_list["data"],
                "page_class"=>$page_class,
                'username'=>$username,
                'comment_list'=>$comment_list["data"],
            ]);
    }
    //修改文章
    public function update(Request $request)
    {
        if (session("username")!=null) {
            $id = $request->get("id");
            $title = $request->get("title");
            $content = $request->get("content");
            $file = $request->file('face');

            $face = "default";

            if ($file != null && $file->isValid()) {
                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                // 上传文件
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                //var_dump($bool);
                $face = env("APP_URL") . "/uploads/" . $filename;
            }
            $abstracts = strip_tags($this->substr_cut($content,15));
            //$tags = 1;

            $params =
                [
                    'params[id]' => $id,
                    'params[title]' => $title,
                    'params[abstracts]' => $abstracts,
                    'params[content]' => $content,
                    //'params[tags]' => $tags
                ];
            if ($face!="default")
            {
                $params["params[face]"] = $face;
            }
            $r = $this->articleInvoker->update($params);
            return redirect("article/list?id=".session("id"));
        }
        else
        {
            return redirect("login");
        }
    }
    //删除文章
    public function delete(Request $request)
    {
        $id = $request->get("id");
        if(session("id")!=null) {
            $id = (string)$id;
            $r = $this->articleInvoker->delete(
                [
                    'ids' => $id,
                ]
            );
            return redirect("article/list?id=" . session("id"));
        }
        return redirect("article?id=" . $id);
    }
    //创建文章
    public function create(Request $request)
    {
        if (session("username")!=null) {
            $title = $request->get("title");
            $content = $request->get("content");
            $file = $request->file('face');
            $tags = $request->get("tags");
            //print_r($tags);
            $the_tag = "";
            if ($tags != null)
            {
                foreach ($tags as $tag_id)
                {
                    settype($tag_id,"string");
                    $the_tag.=$tag_id.",";
                }
            }
            else
            {
                $the_tag=",";
            }

            $the_tag = substr($the_tag,0,strlen($the_tag)-1);
            //print_r ($the_tag);
            //return;
            $face = "default";

            if ($file != null && $file->isValid()) {
                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                // 上传文件
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                //var_dump($bool);
                $face = env("APP_URL") . "/uploads/" . $filename;
            }

            //$abstracts = "abstract";
            $abstracts = strip_tags($this->substr_cut($content,15));
            $author = session("id");
            //$tags = "6,";
            $r = $this->articleInvoker->create(
                [
                    'params[title]' => $title,
                    'params[face]' => $face,
                    'params[abstracts]' => $abstracts,
                    'params[content]' => $content,
                    'params[author_id]' => $author,
                    'params[tags]' => $the_tag,
                ]);
            return redirect("article/list?id=".$author);
        }
        else
        {
            return redirect("login");
        }
    }
    //文章列表页
    public function show_list(Request $request)
    {
        $id = $request->get('id');
        $username = session("username");
        $userid = session("id");
        $params = Array();
        $type = $request->get('type');

        $list_type = $request->get('list_type');
        if($list_type==null)
        {
            $list_type="";
        }
        if($type==null)
        {
            $type="";
        }
        $page_class = "column-view";
        //标签文章列表
        if ($type=="tag")
        {
            $tag = $this->tagInvoker->get(['id' => $id]);
            $article = $this->tagInvoker->articles(['id'=>$id]);
            $is_follower = $this->tagInvoker->hassubscriber(['id'=>$id, 'userid'=>$userid]);
            $params = [
                'page_class'=>$page_class,
                'tag'=>$tag["data"],
                'articles'=>$article["data"],
                'is_follower'=>$is_follower["success"],
            ];
        }
        //用户文章列表
        else {
            $user = $this->userInvoker->get(['id' => $id]);
            $article = $this->userInvoker->lastedarticles(['userid'=>$id]);
            //关注tag
            if ($list_type == "tag") {
                $article = $this->userInvoker->articlestags(['id' => $id]);
            }
            elseif ($list_type == "liker") {
                $article = $this->userInvoker->articlesfollowers(['id' => $id]);
            }
            elseif ($list_type == "collect") {
                $article = $this->userInvoker->articlescollect(['id' => $id]);
            }
            $is_follower = $this->userInvoker->hasfollower(['id'=>$id, 'userid'=>$userid]);
            //print_r($is_follower);
            $params = [
                'page_class'=>$page_class,
                'user'=>$user["data"],
                'articles'=>$article["data"],
                'is_follower'=>$is_follower["success"],
            ];
        }

        if ($username!=null)
        {
            $params["username"] = $username;
        }
        $params["id"] = $id;
        $params["type"] = $type;
        $params["list_type"] = $list_type;
        return view("front/list",$params);
    }

    public function show_list_ajax(Request $request)
    {
        $id = $request->get('id');
        $username = session("username");
        $userid = session("id");
        $params = Array();
        $type = $request->get('type');
        $page = $request->get('page');

        $list_type = $request->get('list_type');
        $page_class = "column-view";
        //标签文章列表
        if ($type=="tag")
        {
            //$tag = $this->tagInvoker->get(['id' => $id]);
            $article = $this->tagInvoker->articles(['id'=>$id, 'page'=>$page]);
            //$is_follower = $this->tagInvoker->hassubscriber(['id'=>$id, 'userid'=>$userid]);

            return json_encode($article);
            /*
            $params = [
                'page_class'=>$page_class,
                'tag'=>$tag["data"],
                'articles'=>$article["data"],
                'is_follower'=>$is_follower["success"],
            ];*/
        }
        //用户文章列表
        else {
            //$user = $this->userInvoker->get(['id' => $id]);

            $article = $this->userInvoker->lastedarticles(['userid'=>$id ,'page'=>$page]);
            //关注tag
            if ($list_type == "tag") {
                $article = $this->userInvoker->articlestags(['id' => $id ,'page'=>$page]);
            }
            elseif ($list_type == "liker") {
                $article = $this->userInvoker->articlesfollowers(['id' => $id ,'page'=>$page]);
            }
            elseif ($list_type == "collect") {
                $article = $this->userInvoker->articlescollect(['id' => $id ,'page'=>$page]);
            }

            return json_encode($article);
/*
            $is_follower = $this->userInvoker->hasfollower(['id'=>$id, 'userid'=>$userid]);
            //print_r($is_follower);
            $params = [
                'page_class'=>$page_class,
                'user'=>$user["data"],
                'articles'=>$article["data"],
                'is_follower'=>$is_follower["success"],
            ];*/
        }


    }


}