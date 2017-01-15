<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 17-1-15
 * Time: 下午3:57
 */

namespace App\Http\Controllers\Admin;


use App\Invokers\ArticleInvoker;

class AdminArticleController extends AdminBaseController
{
    private $articleInvoker;

    public function __construct(ArticleInvoker $articleInvoker)
    {
        $this->articleInvoker = $articleInvoker;
    }
}