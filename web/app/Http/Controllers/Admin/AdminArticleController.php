<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 17-1-15
 * Time: 下午3:57
 */

namespace App\Http\Controllers\Admin;


use App\Invokers\ArticleInvoker;
use App\Invokers\TagInvoker;
use Illuminate\Http\Request;

class AdminArticleController extends AdminBaseController
{
    private $articleInvoker;
    private $tagInvoker;

    public function __construct(ArticleInvoker $articleInvoker, TagInvoker $tagInvoker)
    {
        $this->articleInvoker = $articleInvoker;
        $this->tagInvoker = $tagInvoker;
    }

    public function articleTags(Request $request){
        $id = $request->input('id');
        $article = $this->articleInvoker->get(['id'=>$id]);
        $data = [];
        if($article['success']){
            $data = $article['data']['tagList'];
        }
        $tags = $this->tagInvoker->page();
        $ts = [];
        if($tags['success']){
            $ts = $tags['list'];
        }
        return view('admin/article-tag-list', ['data' => $data, 'tags' => $ts]);
    }

    public function addTags(Request $request){
        $ids = $request->input('ids');
        $articleId = $request->input('articleId');
        $res = $this->articleInvoker->addtags(['articleId' => $articleId, 'tags' => $ids]);
        if ($res['success']){
            return ['success' => 'true'];
        }else {
            return ['success' => 'false', 'message' => $res['message']];
        }
    }

    public function delTags(Request $request){
        $ids = $request->input('tags');
        $articleId = $request->input('articleId');
        $res = $this->articleInvoker->deltags(['articleId' => $articleId, 'tags' => $ids]);
        if ($res['success']){
            return ['success' => 'true'];
        }else {
            return ['success' => 'false', 'message' => $res['message']];
        }
    }

    public function bcheck(Request $request){
        $ids = $request->input('ids');
        $uid = session('id');
        $res = $this->articleInvoker->bcheck(['ids' => $ids, 'operator' => $uid]);
        if ($res['success']){
            return ['success' => 'true'];
        }else {
            return ['success' => 'false', 'message' => $res['message']];
        }
    }

    public function checkarticle(Request $request){
        $id = $request->input('id');
        $res = $this->articleInvoker->get(['id' => $id]);
        return view('admin/check-article', $res['data']);
    }

    public function check(Request $request){
        $params = $request->all();
        $params['operator'] = session('id');
        $res = $this->articleInvoker->check($params);
        if ($res['success']){
            return ['success' => 'true'];
        }else {
            return ['success' => 'false', 'message' => $res['message']];
        }
    }
}