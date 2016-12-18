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
        return $this->articleInvoker->list([
            'order' => 'publish_time desc'
        ]);
    }
}