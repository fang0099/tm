<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-8
 * Time: 下午9:40
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Invokers\SliderInvoker;
use App\Invokers\TagInvoker;
use App\Invokers\UserInvoker;
use App\Invokers\WebInfoInvoker;
use App\Invokers\ArticleInvoker;
use App\Invokers\NewsFlashInvoker;
use Illuminate\Http\Request;

use Storage;

class IndexController extends Controller
{
    private $articleInvoker;
    private $userInvoker;
    private $webInfoInvoker;
    private $tagInvoker;
    private $sliderInvoker;
    private $newsflashInvoker;

    //初始化
    public function __construct(ArticleInvoker $articleInvoker,
                                UserInvoker $userInvoker,
                                WebInfoInvoker $webInfoInvoker,
                                TagInvoker $tagInvoker,
                                SliderInvoker $sliderInvoker,
                                NewsFlashInvoker $newsflashInvoker
                                )
    {
        $this->articleInvoker = $articleInvoker;
        $this->userInvoker = $userInvoker;
        $this->webInfoInvoker = $webInfoInvoker;
        $this->tagInvoker = $tagInvoker;
        $this->sliderInvoker = $sliderInvoker;
        $this->newsflashInvoker = $newsflashInvoker;
    }

    public function show_index()
    {
        $page_class = "home";
        $username = session("username");
        $article_list = $this->articleInvoker->page(['pageSize'=>6]);
        $user_list = $this->userInvoker->page(['pageSize'=>8]);
        $index_tag_list = $this->tagInvoker->indextags(['pageSize'=>8]);
        $menu_tag_list = $this->tagInvoker->menutags(['pageSize'=>8]);
        $tag = $this->tagInvoker->list(['pageSize'=>8]);

        $hot_article_list = $this->articleInvoker->hotest(['pageSize'=>6]);

        $fast_news = $this->newsflashInvoker->list(['pageSize'=>6]);
        //print_r($fast_news);
        //return;
        $recom_articles = array();
        $recom_articles["data"] = null;
        if(session("id")!=null) {
            $recom_articles = $this->userInvoker->articlesrecommend(['id' => session('id')]);
        }
        $params = ['page_class'=>$page_class,
            'articles'=>$article_list["list"],
            'menu_tags'=>$menu_tag_list["data"],
            'index_tags'=>$index_tag_list["data"],
            'users'=>$user_list["list"],
            'hot_articles'=>$hot_article_list["data"],
            'fast_news'=>$fast_news["list"],
            'recom_articles'=>$recom_articles["data"],
            'tags'=>$tag["list"],
        ];

        if ($username!=null)
        {
            $params["username"] = $username;
        }
        return view("front/index", $params);
       // return view("front/36kr_index", $params);
    }

    //上传图片
    public function upload_img(Request $request)
    {
        $file = $request->file('img_name');

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

            $msg = Array();
            $msg["success"]=true;
            $msg["file_path"] = $face;

            return json_encode($msg);
        }
        else
        {
            return "上传失败";
        }
    }

}