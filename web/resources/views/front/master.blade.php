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
    <script src="/zhuanlan/js/es5-shim.js"></script>
    <script src="/zhuanlan/js/html5shiv.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <script src="/zhuanlan/js/json3.min.js"></script>
    <![endif]-->
    <script>document.documentElement.className += ('ontouchstart' in window) ? ' touch': ' no-touch'</script>
    @yield("page_level_css")
    <link rel="stylesheet" href="/jquery-wznav/css.css">
    <link rel="stylesheet" href="/zhuanlan/css/main.css">
    <link rel="stylesheet" href="/zhuanlan/css/icomoon.css">
    <link rel="stylesheet" href="/zhuanlan/css/mine.css">
    <link rel="stylesheet" href="/simple_grid/simplegrid.css">
    <!--<link rel="stylesheet" href="/zhuanlan/css/icomoon.css">-->
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
            <a href="" class="logo icon-ic_zhihu_logo" aria-label="首页"></a>
        </div>
        <div class="navbar-title-container clearfix show" ng-class="{show: showTitle}" ng-click="handleTitleClick($event)">
            <div class="titles oneline ng-hide" ng-class="{oneline: !title.subtitle || !title.main}" ng-hide="!title.subtitle &amp;&amp; !title.main">
            </div>
            <!--<div class="status loading ng-binding ng-scope" ng-if="status" ng-class="status.type">saving</div>-->
        </div>
        @if( !isset($username) )
        <a class="navbar-login btn btn-blue btn-72_32 ng-scope" href="/account#login">登录</a>
        @else
        <div class="navbar-menu-container ui-menu-button ng-scope" >
            <a href="javascript:;" class="menu-button ng-scope" aria-label="更多选项" id="navbar_menu_btn">
                <i class="icon-th-menu-outline"></i>
            </a>
            <menu class="menu navbar-menu ng-scope" id="navbar_menu">
                <a class="menu-item" href="/uc#index" tabindex="0">我的主页</a>
                <a class="menu-item" href="/uc#article" tabindex="0">我的文章</a>
                <a class="menu-item" href="/uc#collect" tabindex="0">我的收藏</a>
                <a class="menu-item" href="/uc#subscribe" tabindex="0">我的订阅</a>
                <a class="menu-item" href="/uc#notice" tabindex="0">我的通知</a>
                <a class="menu-item" href="/uc#setting" tabindex="0">账号设置</a>
                @if(session('is_admin') == 1)
                <a class="menu-item" href="/admin/index" tabindex="0">后台管理</a>
                @endif
                <hr>
                <a class="menu-item" href="/logout"  tabindex="0">退出</a>
            </menu>
        </div>
        @endif
        <div class="navbar-write-container ng-scope">
            <a href="/article/edit" >
                <i class="icon-edit"></i>写文章
            </a>
            <a href="/uc#notice" style="margin : 0px 5px 0px 15px">
                <i class="icon-bell"></i>
            </a>
        </div>
        <div class="navbar-content"></div>
    </header>
    <div class="find_nav">
        <div class="find_nav_left">
            <div class="find_nav_list">
                @if(isset($page_class) and $page_class == "page-write2")
                <a href="#" class="btn">修改</a>
                <a href="#" class="btn">草稿</a>
                @else

                <ul>
                    @if(isset($menu_tags))
                        @foreach($menu_tags as $tag)
                        <!--<li class="find_nav_cur"><a href="article/list?type=tag&id={{$tag["id"]}}">{{$tag["name"]}}</a></li>-->
                            <li class=""><a href="/article/list?type=tag&id={{$tag["id"]}}">{{$tag["name"]}}</a></li>
                        @endforeach
                    @endif
                    <li class="sideline"></li>
                </ul>
                    @endif
            </div>
        </div>

    </div>

</div>
<div class="ui-alertbar info ng-hide" ng-show="show" ui-alertbar="" data-alert="globalAlert" ui-sticky="" data-align="bottom" data-target="#header-holder">
    <i class="icon-ic_prompt_done ng-scope" ng-if="alert.type == &#39;info&#39;"></i>
</div>
@yield("content")
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.js"></script>
<!--<script src="/zhuanlan/js/jquery.min.js"></script>-->
<script type="text/javascript" src="/jquery.pin/jquery.pin.js"></script>
@yield("page_level_js")
<script type="text/javascript" src="/jquery-wznav/js.js"></script>
<script type="text/javascript" src="/zhuanlan/js/main.js"></script>
</body>

</html>
