<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-18
 * Time: 下午8:02
 */

namespace App\Http\Controllers\Admin;


use App\Invokers\ArticleInvoker;

class AdminSelectController extends AdminBaseController
{
    private $articleInvoker;

    public function __construct(ArticleInvoker $articleInvoker)
    {
        $this->articleInvoker = $articleInvoker;
    }

    public function articles(){
        $articles = $this->articleInvoker->list([
            'order' => 'publish_time desc'
        ]);
        if($articles['success']){
            if($articles['data']){
                $as = [];
                if($articles['data']['list']){
                    $as = $articles['data']['list'];
                }else {
                    $as = $articles['data'];
                }
                $res = [];
                foreach ($as as $a) {
                    $res[] = ['key' => $a['title'], 'value' => $a['id']];
                }
                return $res;
            }else {
                return [];
            }
        }else {
            return [];
        }
    }
}