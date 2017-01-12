<!DOCTYPE html>
<html lang="zh-CN" class="">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> {{$article["title"]}}_文章 </title>
    <meta property="og:type" content="article" />
    <meta property="og:title" content=" {{$article["title"]}} " />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit" />
    <link href="http://36kr.com/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1" />
    <meta name="apple-mobile-web-app-title" content="Title" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta name="applicable-device" content="pc,mobile" />
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <!--<base href="/tm/web/public/">-->
    <!--<link rel="stylesheet" type="text/css" href="uc/css/app.usercenter.css" />-->
    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/jquery-wznav/css.css">
    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/zhuanlan/css/main.css">
    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/zhuanlan/css/icomoon.css">

    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/simple_grid/simplegrid.css">

    <link href="./final2/css/36kr_common.css" rel="stylesheet" />
    <link rel="stylesheet" href="./final2/css/36kr_style.css" />
    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/zhuanlan/css/mine.css">
    <link href="./final2/css/36kr_app.css" rel="stylesheet" />
    <script src="./final2/js/jquery.min.js"></script>
    <script src="./final2/js/jquery.qrcode.min.js"></script>
    <style>
        .single-post-tags
        {
            border-top: 1px solid #d3d7db;
        }
    </style>
    <script>
        $(function(){
            $(".back-to-normal").click(function(){
                $("#readmode_win").attr("style","display:none;");
            });

            $(".pure-read").click(function(){
                $("#readmode_win").attr("style","display:block;");
            });

            $('#code').qrcode({
            render: "table", //table方式
                width: 64, //宽度
                height:64, //高度
                text: window.location.href //任意内容
            });
            $('.back').click(function(){
                scroll(0,0);
            });

        });
    </script>
</head>
<body>
<!--模板开始-->
<!--页头通用通知,不要删除-->
<link rel="stylesheet" href="./final2/css/36kr_style.css" />
<link rel="stylesheet" href="<?php echo env('APP_URL');?>/zhuanlan/css/mine.css">
<!--模板结束-->
<div id="app">
    <div data-reactroot="">
        <div class="pagewrap pagewrap-full">
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
                                <a class="menu-item" href="<?php echo env('APP_URL');?>/uc" tabindex="0">用户中心</a>
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

            <div class="article-detail ">
                <div class="post-wrapper">
                    <div id="J_normal_read_5061570" class="post-detail-con-box full-reading mainlib_flex_wapper">
                        <div class="mainlib">
                            <div class="center_content">
                                <div class="content-wrapper">
                                    <div class="article-section" data-articleid="5061570" id="J_post_wrapper_5061570">
                                        <div class="mobile_article">
                                            <h1> {{ $article["title"] }} </h1>
                                            <div class="content-font">
                                                <div class="am-cf author-panel">
                                                    <div class="author am-fl">
                                                        <a href="<?php echo env('APP_URL');?>/article/list?id={{$article["author"]["id"]}}" class="am-fl">
                                                            <span class="name" data-stat-click="wenzhang.zuozhexingming">{{$article["author"]["username"]}}</span></a>
                                                        <span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">{{$article["publish_time"]}}</abbr></span>
                                                        <span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">共 50 字</abbr></span>
                                                        <span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">热度 {{$article["hot_num"]}}</abbr></span>
                                                    </div>
                                                </div>
                                                <section class="summary">
                                                    {{ $article["abstracts"] }}
                                                </section>
                                                <section class="headimg">
                                                    <img src="{{$article["face"]}}" alt="{{ $article["title"] }}" />
                                                </section>
                                                <div>
                                                    <section class="textblock">
                                                        {!! $article["content"] !!}
                                                    </section>
                                                    <section class="article-footer-label">
                                                        <span>原创文章，作者：{{$article["author"]["username"]}}</span>
                                                        <span>，如若转载，请注明出处：</span>
                                                        <span><?php echo env('APP_URL');?>/article?id={{$article["id"]}}</span>
                                                        <!--<div>
                                                            看完这篇还不够？如果你也在创业，并希望自己的项目被报道，请

                                                            <a href="#" target="_blank" rel="nofollow">戳这里</a>
                                                            <span> 告诉我们！</span>
                                                        </div>-->
                                                    </section>
                                                </div>
                                                <section class="ad" id="AD5061570" data-id="16"></section>
                                                <section class="single-post-tags">
                                                    @foreach($article["tags"] as $tag)
                                                        <span class="tag current">
                                                            <a target="_blank" href="http://www.tmtpost.com/tag/299520" class="tag-a">{{$tag["name"]}}</a>
                                                            <span class="gap-line">|</span><span class="act follow">+</span>
                                                            <span class="act unfollow">-</span>
                                                        </span>
                                                    @endforeach


                                                </section>
                                                <div class="fav-wrapper">
                                                    <div class="jianshu_btn like-group">
                                                        <div class="btn-like">
                                                            <a><i class="icon-ic_like"></i> 喜欢</a>
                                                        </div>
                                                        <div class="modal-wrap">
                                                            <a>{{$article["likes"]}}</a>
                                                        </div>
                                                    </div>
                                                    <div class="jianshu_btn like-group">
                                                        <div class="btn-like">
                                                            <a><i class="icon-ic_like"></i> 收藏</a>
                                                        </div>
                                                        <div class="modal-wrap">
                                                            <a>0</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="share-nav">
                                                    <div class="inner fixed" style="width: 720px;">
                                                        <div class="box am-cf">
                                                            <div class="share-author am-cf am-fl">
                                                                <a href="<?php echo env('APP_URL');?>/article/list?id={{$article["author"]["id"]}}"><img class="avatar" data-stat-click="wenzhang.share.zuozhetouxiang" src="{{$article["author"]["avatar"]}}" alt="" /><span class="name" data-stat-click="wenzhang.share.zuozhexingming">{{$article["author"]["username"]}}</span></a>
                                                                <span class="kr-tag-arrow-blue kr-size-min">
                                                                    <span class="arrow"><em></em></span><span>{{$article["publish_time"]}}</span>
                                                                </span>
                                                                <!--<a class="btn" style="float:right;">关注</a>-->
                                                            </div>
                                                            <div class="other-ctrl ctrl-box am-fr">
                                                              <span class="icon-readmode pure-read cell">
                                                               <div class="tip">
                                                                <div class="inner-box">
                                                                 <span class="kr-arrow-down kr-arrow" data-stat-click="webtoolbar.deepreading"><span></span></span>
                                                                 <div>
                                                                  <p>“点击”尽享阅读沉浸模式, </p>
                                                                  <p>沉浸模式下点击右上角按钮返回</p>
                                                                 </div>
                                                                </div>
                                                               </div></span>
                                                                <span class="icon-back-top back cell" data-stat-click="webtoolbar.turntotop"></span>
                                                            </div>
                                                            <div class="share-ctrl ctrl-box am-fr">
                                                              <span class="icon-weixin wechat cell">
                                                               <div class="tip">
                                                                <div class="inner-box">
                                                                 <span class="kr-arrow-down kr-arrow"><span></span></span>
                                                                 <div class="am-cf">
                                                                  <div class="img-box am-fl">
                                                                      <div id="code"></div>
                                                                  </div>
                                                                  <div class="txt">
                                                                   <p>打开微信&quot;扫一扫&quot;, </p>
                                                                   <p>打开网页后点击屏幕</p>
                                                                   <p>右上角&quot;分享&quot;按钮</p>
                                                                  </div>
                                                                 </div>
                                                                </div>
                                                               </div></span>
                                                                <a class="icon-weibo weibo cell" target="_blank" data-stat-click="webtoolbar.weibo" href="http://share.baidu.com/s?type=text&amp;searchPic=1&amp;sign=on&amp;to=tsina&amp;key=595885820&amp;url=http://36kr.com/p/5061570.html&amp;title=%20%E3%80%90%E8%BD%AC%E6%9D%BF%E4%B8%93%E9%A2%98%E6%8A%A5%E5%91%8A%E3%80%91%E6%96%B0%E4%B8%89%E6%9D%BF%E8%BD%AC%E6%9D%BF%E5%A4%A7%E6%BD%AE%EF%BC%9A%E8%AD%A6%E6%83%95%E4%B8%80%E5%93%84%E8%80%8C%E4%B8%8A%E7%9A%84%E9%AB%98%E4%BC%B0%E5%80%BC%E6%8A%95%E8%B5%84%E9%A3%8E%E9%99%A9%20"></a>
                                                                <a class="icon-youdao youdao cell" title="收藏文章至有道云笔记" data-stat-click="webtoolbar.youdao" target="_blank" href="http://note.youdao.com/memory/?url=http://36kr.com/p/5061570.html&amp;title=%20%E3%80%90%E8%BD%AC%E6%9D%BF%E4%B8%93%E9%A2%98%E6%8A%A5%E5%91%8A%E3%80%91%E6%96%B0%E4%B8%89%E6%9D%BF%E8%BD%AC%E6%9D%BF%E5%A4%A7%E6%BD%AE%EF%BC%9A%E8%AD%A6%E6%83%95%E4%B8%80%E5%93%84%E8%80%8C%E4%B8%8A%E7%9A%84%E9%AB%98%E4%BC%B0%E5%80%BC%E6%8A%95%E8%B5%84%E9%A3%8E%E9%99%A9%20&amp;summary=%E6%96%B0%E4%B8%89%E6%9D%BF2016%E5%B9%B4%E7%9A%84%E6%94%B6%E5%AE%98%E4%B9%8B%E6%88%98%E5%B7%B2%E7%BB%8F%E5%91%8A%E4%B8%80%E6%AE%B5%E8%90%BD%EF%BC%8C%E7%BA%B5%E8%A7%822016%E5%B9%B4%E5%BA%A6%E5%85%A8%E5%B9%B4%EF%BC%8C%E6%96%B0%E4%B8%89%E6%9D%BF%E6%8C%82%E7%89%8C%E4%BC%81%E4%B8%9A%E6%95%B0%E9%87%8F%E5%92%8C%E6%80%BB%E5%B8%82%E5%80%BC%E8%A7%84%E6%A8%A1%E5%9D%87%E5%91%88%E7%8E%B0%E5%BF%AB%E9%80%9F%E5%A2%9E%E9%95%BF%E3%80%82%09%20%20%20&amp;pic=&amp;product=%E7%BD%91%E9%A1%B5%E6%94%B6%E8%97%8F&amp;vendor=36krweb"></a>
                                                            </div>
                                                            <div class="user-ctrl ctrl-box am-fr">
                                                                <!--<span class="icon-readmode">
                                                                   <div class="tip">
                                                                    <div class="inner-box cell">
                                                                     <span class="kr-arrow-down kr-arrow" data-stat-click="webtoolbar.deepreading"><span></span></span>
                                                                     <div>
                                                                      <p>关注作者 </p>

                                                                     </div>
                                                                    </div>
                                                                   </div>
                                                                </span>-->
                                                                <span data-stat-click="webtoolbar.favorite" class="icon-collect-min cell"></span>
                                                                <span data-stat-click="webtoolbar.favorite" class="icon-collect-min cell"></span>
                                                                <span data-stat-click="webtoolbar.comment" class="icon-comment-min cell"></span>
                                                            </div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="h5-author-info am-cf">
                                                    <div class="img-box am-fl">
                                                        <a href="<?php echo env('APP_URL');?>/article/list?id={{$article["author"]["id"]}}" target="_blank"><img src="{{$article["author"]["avatar"]}}" /></a>
                                                    </div>
                                                    <div class="info">
                                                        <p class="name"><a href="<?php echo env('APP_URL');?>/article/list?id={{$article["author"]["id"]}}" target="_blank">{{$article["author"]["username"]}}</a><span class="kr-tag-arrow-blue kr-size-min"><span class="arrow"><em></em></span><span></span></span></p>
                                                        <p class="intro">{{$article["author"]["brief"]}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div></div>
                                        <div class="mobile_article">
                                            <!--<section class="single-post-comment">
                                                <h4><a name="comment">参与讨论</a></h4>
                                                <div class="input-module notlogin">
                                                    <textarea id="J_comment_area_5061570" disabled="" placeholder="请登录后参与评论..."></textarea>
                                                    <div class="user">
                                                        <button type="button" disabled="" title="请登录后参与评论"><a data-stat-click="pinglun.fabupinglun" href="http://passport.36kr.com/pages/?ok_url=http://36kr.com%2Fp%2F5061570.html">提交评论</a></button>
                                                        <div class="current-user">
                                                            <span class="img" style="background: url(&quot;http://krplus-pic.b0.upaiyun.com/201601/28103657/f3a5016d8jzc4auz.png&quot;) center center / 80% no-repeat rgb(241, 241, 241);"></span>
                                                            <a href="http://passport.36kr.com/pages/?ok_url=http://36kr.com%2Fp%2F5061570.html" class="name">登录</a>
                                                            <span>后参与讨论</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="display-module"></div>
                                            </section>-->
                                        </div>
                                        <div>
                                            <!--<div class="related-articles">
                                                <h4>猜你喜欢</h4>
                                                <div class="row layout-image-display" style="margin-left: -10px; margin-right: -10px;">
                                                    <div class="col-8" style="padding-left: 10px; padding-right: 10px;">
                                                        <div class="each-cell" data-stat-click="guess.1">
                                                            <div class="img-box">
                                                                <a href="/p/5061525.html?from=guess" target="_blank" class="fadeIn" style="background-image: url(&quot;https://pic.36krcnd.com/avatar/201701/09140553/2ewl5h0bn71c51ed.png!heading&quot;);"><img class="load-img fade" src="https://pic.36krcnd.com/avatar/201701/09140553/2ewl5h0bn71c51ed.png!heading" /></a>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="desc-inner">
                                                                    <a target="_blank" href="/p/5061525.html?from=guess">小程序开闸，新的消费机会在哪里？我们和十一家公司聊了聊</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8" style="padding-left: 10px; padding-right: 10px;">
                                                        <div class="each-cell" data-stat-click="guess.2">
                                                            <div class="img-box">
                                                                <a href="/p/5061531.html?from=guess" target="_blank" class="fadeIn" style="background-image: url(&quot;https://pic.36krcnd.com/avatar/201701/09154054/5e7r0aspexcjxjcs.png!heading&quot;);"><img class="load-img fade" src="https://pic.36krcnd.com/avatar/201701/09154054/5e7r0aspexcjxjcs.png!heading" /></a>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="desc-inner">
                                                                    <a target="_blank" href="/p/5061531.html?from=guess">【独家】在CES路演大赛上，一辆中国电动车成了评审眼中的“颜值担当”</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8" style="padding-left: 10px; padding-right: 10px;">
                                                        <div class="each-cell" data-stat-click="guess.3">
                                                            <div class="img-box">
                                                                <a href="/p/5061524.html?from=guess" target="_blank" class="fadeIn" style="background-image: url(&quot;https://pic.36krcnd.com/avatar/201701/09134828/7dn3fuksnvrk980d.jpg!heading&quot;);"><img class="load-img fade" src="https://pic.36krcnd.com/avatar/201701/09134828/7dn3fuksnvrk980d.jpg!heading" /></a>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="desc-inner">
                                                                    <a target="_blank" href="/p/5061524.html?from=guess">乐视你要是再拿FF吹牛逼，我可要报警了！</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8" style="padding-left: 10px; padding-right: 10px;">
                                                        <div class="each-cell" data-stat-click="guess.4">
                                                            <div class="img-box">
                                                                <a href="/p/5061665.html?from=guess" target="_blank" class="fadeIn" style="background-image: url(&quot;https://pic.36krcnd.com/avatar/201701/11020436/dfk6ig18hfm5anv9.jpg!heading&quot;);"><img class="load-img fade" src="https://pic.36krcnd.com/avatar/201701/11020436/dfk6ig18hfm5anv9.jpg!heading" /></a>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="desc-inner">
                                                                    <a target="_blank" href="/p/5061665.html?from=guess">2016中国app年度排行榜：十大行业、25个领域、Top 500 和2017趋势预测</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8" style="padding-left: 10px; padding-right: 10px;">
                                                        <div class="each-cell" data-stat-click="guess.5">
                                                            <div class="img-box">
                                                                <a href="/p/5061582.html?from=guess" target="_blank" class="fadeIn" style="background-image: url(&quot;https://pic.36krcnd.com/avatar/201701/10054009/xaznitty24lq0fqm.jpg!heading&quot;);"><img class="load-img fade" src="https://pic.36krcnd.com/avatar/201701/10054009/xaznitty24lq0fqm.jpg!heading" /></a>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="desc-inner">
                                                                    <a target="_blank" href="/p/5061582.html?from=guess">AI 首次在德州扑克战胜人类职业玩家，新算法让机器拥有“直觉”</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8" style="padding-left: 10px; padding-right: 10px;">
                                                        <div class="each-cell" data-stat-click="guess.6">
                                                            <div class="img-box">
                                                                <a href="/p/5061655.html?from=guess" target="_blank" class="fadeIn" style="background-image: url(&quot;https://pic.36krcnd.com/avatar/201701/10162724/8kndemu4lhyqvdw9.jpg!heading&quot;);"><img class="load-img fade" src="https://pic.36krcnd.com/avatar/201701/10162724/8kndemu4lhyqvdw9.jpg!heading" /></a>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="desc-inner">
                                                                    <a target="_blank" href="/p/5061655.html?from=guess">小程序才是微信的初心</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </div>
                                        <div class="related-articles-h5">
                                            <h4>相关文章</h4>
                                            <div class="list">

                                                <div class="each-cell am-cf">
                                                    <div class="img-box">
                                                        <a href="http://36kr.com/p/5052642.html?from=related" target="_blank" style="background-image: url(&quot;https://pic.36krcnd.com/avatar/201609/12130801/81j874eiyny8jwtb.jpg!feature&quot;);"></a>
                                                    </div>
                                                    <div class="info">
                                                        <p class="name"><a target="_blank" href="http://36kr.com/p/5052642.html?from=related">期权池的正确打开方式</a></p>
                                                        <p class="note"><span>文</span><span>/</span><a target="_blank" href="http://36kr.com/user/1720741331">鹿投</a></p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-detail-plan-bottom">
                                    <div class="plan-image plan-lazyload-box" data-adid="73" data-name="a_d_bd_div"></div>
                                </div>
                            </div>
                        </div>
                        <div class="rightlib cover_css">
                            <div class="pad_inner">
                                <div class="author-info">
                                    <!-- react-empty: 236 -->
                                    <!-- react-empty: 237 -->
                                    <!-- react-empty: 238 -->
                                    <div class="role-writer padding-wrapper right-author">
                                        <div class="author-avatar">
                                            <a href="<?php echo env('APP_URL');?>/article/list?id={{$article["author"]["id"]}}" target="_blank" data-stat-click="youcezuozhe.touxiang.2026524780" class="pointer" style="background-image: url(&quot;<?php echo env('APP_URL');?>/{{$article["author"]["avatar"]}}&quot;);"></a>
                                        </div>
                                        <div class="author-info">
                                            <a class="name pointer" href="<?php echo env('APP_URL');?>/article/list?id={{$article["author"]["id"]}}" target="_blank" data-stat-click="youcezuozhe.mingcheng.2026524780">{{$article["author"]["username"]}}</a>
                                            <span class="kr-tag-arrow-blue kr-size-min"><span class="arrow"><em></em></span><span>特邀作者</span></span>
                                        </div>
                                        <div class="author-desc">
                                            {{$article["author"]["brief"]}}
                                        </div>
                                        <div class="post-count">
                                            <span class="icon-article"></span>
                                            <span>
              <!-- react-text: 252 -->共发表
                                                <!-- /react-text -->
                                                <!-- react-text: 253 -->{{$author["articlesCount"]}}
                                                <!-- /react-text -->
                                                <!-- react-text: 254 -->篇
                                                <!-- /react-text --></span>
                                        </div>
                                        <div class="post-list">
                                            <h4>最近文章</h4>
                                            <ul class="list">
                                                @foreach($recent_article_list as $a)
                                                <li data-stat-click="articles.latestnews.2026524780.5061570"><p class="title"><a href="article?id={{$a["id"]}}" target="_blank"> {{$a["title"]}} </a></p><p class="note am-cf"><span class="time am-fl">{{$article["publish_time"]}}</span><span class="tag am-fr"><!--行业新闻--></span></p></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <section class="enter-report">
                                            <a data-stat-click="youcezuozhe.xunqiubaodao" rel="nofollow" href="<?php echo env('APP_URL');?>/article/list?id={{$article["author"]["id"]}}" target="_blank">阅读更多文章，狠戳这里</a>
                                        </section>
                                    </div>
                                </div>
                                <div class="plan-image plan-lazyload-box" data-adid="15" data-name="right_ad_img1"></div>
                                <div></div>
                                <div class="plan-image plan-lazyload-box" data-adid="33" data-name="right_ad_img2"></div>
                                <!-- react-empty: 192 -->
                                <div class="pin-wrapper" style="height: 520px;">
                                    <div class="custom-pin-wrapper" style="width: 320px;">
                                        <div>
                                            <div class="guess-posts-list">
                                                <h4>您可能感兴趣的文章</h4>
                                                <ul>
                                                    @foreach($recommend_list as $a)
                                                    <li class="top" data-index="1"><a href="article?id={{$a["id"]}}" target="_blank" class="item" data-stat-click="articles.related.1"><span class="desc">{{$a["title"]}}</span></a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <!--<div class="sponsor" style="display: none;">
                                            <h5><span>赞助商</span></h5>
                                            <ul class="am-list am-list-static">
                                                <li></li>
                                                <li> </li>
                                                <li> </li>
                                            </ul>
                                        </div>-->

                                        <div class="sponsor" style="display: block;">
                                            <h5><span>赞助商</span></h5>
                                            <ul class="am-list am-list-static">
                                                <li>
                                                    <div class="baidu_ads_cell">
                                                        <div class="msgwrap">
                                                            <div class="msgleft">
                                                                <a href="https://36kr.com/pp/ap/click?pid=14&amp;r=http%3A%2F%2Fmarket.cmbchina.com%2Fcorporate%2F2016wealthManPc%2Fjyyh.html" target="_blank" style="background-image:url(https://pic.36krcnd.com//avatar/201612/16121303/y998zdddv7y00rj2.png)" rel="nofollow"></a>
                                                            </div>
                                                            <div class="msgright">
                                                                <h4><a href="https://36kr.com/pp/ap/click?pid=14&amp;r=http%3A%2F%2Fmarket.cmbchina.com%2Fcorporate%2F2016wealthManPc%2Fjyyh.html" target="_blank">【招商银行】</a></h4>
                                                                <p class="note">交易银行提供全面金融解决方案</p>
                                                            </div>
                                                        </div>
                                                    </div></li>
                                                <li> </li>
                                                <li> </li>
                                            </ul>
                                        </div>
                                        <div class="next-post-wrapper show">
                                            <h4>下一篇</h4>
                                            <div class="item" data-stat-click="articles.next">
                                                <a href="<?php echo env('APP_URL');?>/article?id={{$next_article["id"]}}" class="title" target="_blank">{{$next_article["title"]}}</a>
                                                <div class="tags-list">
                                                    <i class="icon-tag"></i>
                                                    @if(isset($next_article["tagList"]))
                                                        @foreach( $next_article["tagList"] as $tag)
                                                        <span><a href="<?php echo env('APP_URL');?>/article/list?type=tag&id={{$tag["id"]}}" target="_blank">{{$tag["name"]}}</a><span>，
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="share-nav-h5">
                <div class="inner">
                    <div class="box am-cf">
                        <div class="each-cell">
                            <span class="icon-collect cell"></span>
                        </div>
                        <div class="each-cell">
                            <span class="icon-comments cell"></span>
                        </div>
                        <div class="each-cell">
                            <a class="icon-weibo weibo cell" href="http://share.baidu.com/s?type=text&amp;searchPic=1&amp;sign=on&amp;to=tsina&amp;key=595885820&amp;url=<?php echo env('APP_URL');?>/article?id={{$article["id"]}}&amp;title={{$article["title"]}}"></a>
                        </div>
                        <div class="each-cell">
                            <span class="icon-back-top back cell"></span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="article-detail" id="readmode_win" style="display:none;">
                <a class="am-icon-reply back-to-normal"></a>
                <div class="only-article-shadow show-model"></div>
                <div class="only-article show-model" style="height:1024px;">
                    <div class="center-content" style="">
                        <div class="content-wrapper">
                            <div class="post-wrapper" id="J_pure_read_5061570">
                                <div class="pure-post">
                                    <div class="article-section">
                                        <h1> {{$article["title"]}} </h1>
                                        <div class="content-font">
                                            <div class="am-cf author-panel">
                                                <div class="author am-fl">
                                                    <a href="<?php echo env('APP_URL');?>/article/list?id={{$article["author"]["id"]}}" class="am-fl"><span class="name" >{{$article["author"]["username"]}}</span></a>
                                                    <span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">{{$article["publish_time"]}}</abbr></span>
                                                    <!--<span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">行业新闻</abbr></span>-->
                                                </div>
                                            </div>
                                            <section class="headimg">
                                                <img src="{{$article["face"]}}" alt="{{$article["title"]}}" />
                                            </section>
                                            <div>
                                                <section class="textblock">
                                                    {!! $article["content"] !!}
                                                </section>
                                                <section class="article-footer-label">
                                                    <span>原创文章，作者：{{$article["author"]["username"]}}</span>
                                                    <span>，如若转载，请注明出处：</span>
                                                    <span><?php echo env('APP_URL');?>/article?id={{$article["id"]}}</span>
                                                </section>
                                                <!--<section>
                                                    <span>“看完这篇还不够？如果你也在创业，并希望自己的项目被报道，请</span>
                                                    <a href="http://chuang.36kr.com/report#/report/index" target="_blank" rel="nofollow">戳这里</a>
                                                    <span>告诉我们！”</span>
                                                </section>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!--<div class="loading_article">
                                <div>
                                    <div class="circle">
                                        <i class="icon-loading"></i>
                                    </div>
                                    <b>加载中</b>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <div class="center-content" style="">
                    </div>
                    <div class="center-content" style="">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo env('APP_URL');?>/jquery.pin/jquery.pin.js"></script>

<script type="text/javascript" src="<?php echo env('APP_URL');?>/jquery-wznav/js.js"></script>
<script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/js/main.js"></script>
</body>
</html>