<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
       /* @charset "UTF-8";*/
        [ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide {
            display: none !important;
        }

        ng\:form {
            display: block;
        }
        .ng-animate-block-transitions {
            transition: 0s all!important;
            -webkit-transition: 0s all!important;
        }

        .ng-hide-add-active,.ng-hide-remove {
            display: block!important;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ $title or '贝塔区块链 - 随心写作，自由表达' }}</title>
    <base href=".">
    <meta name="fragment" content="!">
    <meta name="description" content="贝塔区块链">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <!--[if lt IE 9]>
    <script src="<?php echo env('APP_URL');?>/zhuanlan/js/es5-shim.js"></script>
    <script src="<?php echo env('APP_URL');?>/zhuanlan/js/html5shiv.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <script src="<?php echo env('APP_URL');?>/zhuanlan/js/json3.min.js"></script>
    <![endif]-->
    <script>document.documentElement.className += ('ontouchstart' in window) ? ' touch': ' no-touch'</script>
    @yield("page_level_css")
    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/jquery-wznav/css.css">
    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/zhuanlan/css/main.css">
    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/zhuanlan/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/zhuanlan/css/mine.css">
    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/simple_grid/simplegrid.css">
    <!--<link rel="stylesheet" href="<?php echo env('APP_URL');?>/zhuanlan/css/icomoon.css">-->
</head>
<body ng-app="columnWebApp" ng-controller="AppCtrl" ng-class="pageClass" class="ng-scope {{$page_class}}">
<!--[if lt IE 8]>
<p class="browsehappy">你正在使用一个
    <strong>过时</strong>的浏览器。请
    <a class="link" href="http://browsehappy.com">升级你的浏览器</a>以查看此页面。</p></p>
<![endif]-->
<div id="header-holder">
    <header id="header" class="navbar ng-scope ng-isolate-scope" fixed="scrollBackFixedNavbar">
        <div class="navbar-logo-container">
            <a href="<?php echo env('APP_URL');?>" class="logo icon-ic_zhihu_logo" aria-label="首页"></a>
        </div>
        <div class="navbar-title-container clearfix show" ng-class="{show: showTitle}" ng-click="handleTitleClick($event)">
            <div class="titles oneline ng-hide" ng-class="{oneline: !title.subtitle || !title.main}" ng-hide="!title.subtitle &amp;&amp; !title.main">
            </div>
            <!--<div class="status loading ng-binding ng-scope" ng-if="status" ng-class="status.type">saving</div>-->
        </div>
        @if( !isset($username) )
        <a class="navbar-login btn btn-blue btn-72_32 ng-scope" href="<?php echo env('APP_URL');?>/login">登录</a>
        @else
        <div class="navbar-menu-container ui-menu-button ng-scope" >
            <a href="javascript:;" class="menu-button ng-scope" aria-label="更多选项" id="navbar_menu_btn">
                <i class="icon-th-menu-outline"></i>
            </a>
            <menu class="menu navbar-menu ng-scope" id="navbar_menu">
                <a class="menu-item" href="<?php echo env('APP_URL');?>/article/list?id=<?php echo session('id');?>" tabindex="0">我的文章</a>
                <a class="menu-item" href="<?php echo env('APP_URL');?>/user/follower?id=<?php echo session('id');?>" tabindex="0">我的粉丝</a>
                <a class="menu-item" href="<?php echo env('APP_URL');?>/user/liker?id=<?php echo session('id');?>" tabindex="0">关注作者</a>
                <a class="menu-item" href="<?php echo env('APP_URL');?>/article/list?list_type=liker&id=<?php echo session('id');?>" tabindex="0">关注作者文章</a>
                <a class="menu-item" href="<?php echo env('APP_URL');?>/article/list?list_type=collect&id=<?php echo session('id');?>" tabindex="0">收藏文章列表</a>
                <a class="menu-item" href="<?php echo env('APP_URL');?>/article/list?list_type=tag&id=<?php echo session('id');?>" tabindex="0">订阅标签文章列表</a>
                <a class="menu-item" href="<?php echo env('APP_URL');?>/index.php/admin/index" tabindex="0">后台管理</a>
                <hr ng-if="inWrite &amp;&amp; !hideDelete" class="ng-scope">
                <a class="menu-item" href="<?php echo env('APP_URL');?>/logout" target="_blank" tabindex="0">退出</a>
            </menu>
        </div>
        @endif
        <div class="navbar-write-container ng-scope">
            <a href="<?php echo env('APP_URL');?>/article/edit" >
                <i class="icon-edit"></i>写文章
            </a>
        </div>
        <div class="navbar-content"></div>
    </header>
    <div class="find_nav">
        <div class="find_nav_left">
            <div class="find_nav_list">
                <ul>
                    @if(isset($menu_tags))
                        @foreach($menu_tags as $tag)
                        <!--<li class="find_nav_cur"><a href="article/list?type=tag&id={{$tag["id"]}}">{{$tag["name"]}}</a></li>-->
                            <li class=""><a href="<?php echo env('APP_URL');?>/article/list?type=tag&id={{$tag["id"]}}">{{$tag["name"]}}</a></li>
                        @endforeach
                    @endif
                    <li class="sideline"></li>
                </ul>
            </div>
        </div>

    </div>



</div>
<!--<div class="find_nav">
    <div class="find_nav_left">
        <div class="find_nav_list">
            <ul>
                <li class="find_nav_cur"><a href="javascript:void(0)">资讯</a></li>
                <li><a href="javascript:void(0)">分析</a></li>
                <li><a href="javascript:void(0)">原创</a></li>
                <li><a href="javascript:void(0)">评论</a></li>
                <li><a href="javascript:void(0)">技术</a></li>
                <li><a href="javascript:void(0)">项目</a></li>
                <li><a href="javascript:void(0)">黄页</a></li>
                <li><a href="javascript:void(0)">股市</a></li>
                <li><a href="javascript:void(0)">经济</a></li>
                <li class="sideline"></li>
            </ul>
        </div>
    </div>

</div>-->
<div class="ui-alertbar info ng-hide" ng-show="show" ui-alertbar="" data-alert="globalAlert" ui-sticky="" data-align="bottom" data-target="#header-holder">
    <i class="icon-ic_prompt_done ng-scope" ng-if="alert.type == &#39;info&#39;"></i>
</div>
@yield("content")
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.js"></script>
<!--<script src="<?php echo env('APP_URL');?>/zhuanlan/js/jquery.min.js"></script>-->
<script type="text/javascript" src="<?php echo env('APP_URL');?>/jquery.pin/jquery.pin.js"></script>
@yield("page_level_js")
<script type="text/javascript" src="<?php echo env('APP_URL');?>/jquery-wznav/js.js"></script>
<script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/js/main.js"></script>
</body>

</html>
