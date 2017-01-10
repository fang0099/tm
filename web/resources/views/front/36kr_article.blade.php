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
                text: "www.helloweba.com" //任意内容
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


<!--<link rel="stylesheet" type="text/css" href="uc/css/app.usercenter_trim.css" />-->
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
                                                        <a href="http://36kr.com/user/2026524780" class="am-fl"><span class="name" data-stat-click="wenzhang.zuozhexingming">{{$article["author"]["username"]}}</span></a>
                                                        <span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">{{$article["publish_time"]}}</abbr></span>
                                                        <!--<span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">行业新闻</abbr></span>-->
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
                                                        <span>http://36kr.com/p/5061570.html</span>
                                                        <div>
                                                            <!-- react-text: 36 -->看完这篇还不够？如果你也在创业，并希望自己的项目被报道，请
                                                            <!-- /react-text -->
                                                            <a href="http://chuang.36kr.com/report#/report/index" target="_blank" rel="nofollow">戳这里</a>
                                                            <span> 告诉我们！</span>
                                                        </div>
                                                    </section>
                                                </div>
                                                <!-- react-empty: 39 -->
                                                <section class="ad" id="AD5061570" data-id="16"></section>
                                                <section class="single-post-tags">
                                                    @foreach($article["tags"] as $tag)
                                                    <a class="kr-tag-gray" href="article/list?type=tag&id={{$tag["id"]}}" target="_blank">{{$tag["name"]}}</a>
                                                        @endforeach
                                                </section>
                                                <div class="fav-wrapper">
                                                    <div class="common-post-like-wrapper" data-stat-click="article.like.5061570">
                                                        <a class="post-pc-like"><span class="icon-ic_like"></span><span style="margin-left: 4px;">
                                                                <!-- react-text: 54 -->赞
                                                                <!-- /react-text --></span></a>
                                                        <span class="count-box"><span class="count kr-animated ">+1</span></span>
                                                    </div>
                                                </div>
                                                <div class="share-nav">
                                                    <div class="inner fixed" style="width: 720px;">
                                                        <div class="box am-cf">
                                                            <div class="share-author am-cf am-fl">
                                                                <a href="http://36kr.com/user/2026524780"><img class="avatar" data-stat-click="wenzhang.share.zuozhetouxiang" src="./【转板专题报告】新三板转板大潮：警惕一哄而上的高估值投资风险_files/wsh6eszo3dpx9vbb.jpg!50" alt="" /><span class="name" data-stat-click="wenzhang.share.zuozhexingming">新三板在线</span></a>
                                                                <span class="kr-tag-arrow-blue kr-size-min"><span class="arrow"><em></em></span><span>特邀作者</span></span>
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
                                                                   <!--<img src="./final2/scripts/qrcode.php" />-->
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
                                                                <span data-stat-click="webtoolbar.favorite" class="icon-collect-min cell"></span>
                                                                <span data-stat-click="webtoolbar.comment" class="icon-comment-min cell"></span>
                                                            </div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="h5-author-info am-cf">
                                                    <div class="img-box am-fl">
                                                        <a href="http://36kr.com/user/2026524780" target="_blank"><img src="{{$article["author"]["avatar"]}}" /></a>
                                                    </div>
                                                    <div class="info">
                                                        <p class="name"><a href="http://36kr.com/user/2026524780" target="_blank">{{$article["author"]["username"]}}</a><span class="kr-tag-arrow-blue kr-size-min"><span class="arrow"><em></em></span><span>特邀作者</span></span></p>
                                                        <p class="intro">新三板在线 新三板垂直生态平台</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div></div>
                                        <div class="mobile_article">
                                            <section class="single-post-comment">
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
                                            </section>
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
                                                <div class="each-cell am-cf">
                                                    <div class="img-box">
                                                        <a href="http://36kr.com/p/5059812.html?from=related" target="_blank" style="background-image: url(&quot;https://pic.36krcnd.com/avatar/201612/20092126/b7v898hvhaqsn1y4.jpg!feature&quot;);"></a>
                                                    </div>
                                                    <div class="info">
                                                        <p class="name"><a target="_blank" href="http://36kr.com/p/5059812.html?from=related">创业中，如果你想退出怎么办？</a></p>
                                                        <p class="note"><span>文</span><span>/</span><a target="_blank" href="http://36kr.com/user/1864046570">译东西</a></p>
                                                    </div>
                                                </div>
                                                <div class="each-cell am-cf">
                                                    <div class="img-box">
                                                        <a href="http://36kr.com/p/5060592.html?from=related" target="_blank" style="background-image: url(&quot;https://pic.36krcnd.com/avatar/201612/29040505/j05uhragimxe42qd.jpg!feature&quot;);"></a>
                                                    </div>
                                                    <div class="info">
                                                        <p class="name"><a target="_blank" href="http://36kr.com/p/5060592.html?from=related">2016 年投资方向转变：从商业模式投资转向技术投资</a></p>
                                                        <p class="note"><span>文</span><span>/</span><a target="_blank" href="http://36kr.com/user/1864046570">译东西</a></p>
                                                    </div>
                                                </div>
                                                <div class="each-cell am-cf">
                                                    <div class="img-box">
                                                        <a href="http://36kr.com/p/5060903.html?from=related" target="_blank" style="background-image: url(&quot;https://pic.36krcnd.com/avatar/201701/03030141/ifheyo8y7z80ir99.jpg!feature&quot;);"></a>
                                                    </div>
                                                    <div class="info">
                                                        <p class="name"><a target="_blank" href="http://36kr.com/p/5060903.html?from=related">2017年，投资人应关注哪些海外新兴市场？</a></p>
                                                        <p class="note"><span>文</span><span>/</span><a target="_blank" href="http://36kr.com/user/420313362">aiko</a></p>
                                                    </div>
                                                </div>
                                                <div class="each-cell am-cf">
                                                    <div class="img-box">
                                                        <a href="http://36kr.com/p/5061117.html?from=related" target="_blank" style="background-image: url(&quot;https://pic.36krcnd.com/avatar/201701/05062640/oar85jkemqqhphbs.jpg!feature&quot;);"></a>
                                                    </div>
                                                    <div class="info">
                                                        <p class="name"><a target="_blank" href="http://36kr.com/p/5061117.html?from=related">2016年新三板十大夭折定增：300亿定增一笑而过，“专情”却被放鸽子</a></p>
                                                        <p class="note"><span>文</span><span>/</span><a target="_blank" href="http://36kr.com/user/2026524780">新三板在线</a></p>
                                                    </div>
                                                </div>
                                                <div class="each-cell am-cf">
                                                    <div class="img-box">
                                                        <a href="http://36kr.com/p/5061121.html?from=related" target="_blank" style="background-image: url(&quot;https://pic.36krcnd.com/avatar/201701/05130305/ckpg0aitx81k25kp.jpg!feature&quot;);"></a>
                                                    </div>
                                                    <div class="info">
                                                        <p class="name"><a target="_blank" href="http://36kr.com/p/5061121.html?from=related">去“独角兽”公司工作好不好？</a></p>
                                                        <p class="note"><span>文</span><span>/</span><a target="_blank" href="http://36kr.com/user/1864046570">译东西</a></p>
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
                                            <a href="http://36kr.com/user/2026524780" target="_blank" data-stat-click="youcezuozhe.touxiang.2026524780" class="pointer" style="background-image: url(&quot;<?php echo env('APP_URL');?>/{{$article["author"]["avatar"]}}&quot;);"></a>
                                        </div>
                                        <div class="author-info">
                                            <a class="name pointer" href="http://36kr.com/user/2026524780" target="_blank" data-stat-click="youcezuozhe.mingcheng.2026524780">{{$article["author"]["username"]}}</a>
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
                                                <li data-stat-click="articles.latestnews.2026524780.5061570"><p class="title"><a href="article?id={{$a["id"]}}" target="_blank"> {{$a["title"]}} </a></p><p class="note am-cf"><span class="time am-fl">6分钟前</span><span class="tag am-fr">行业新闻</span></p></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <section class="enter-report">
                                            <a data-stat-click="youcezuozhe.xunqiubaodao" rel="nofollow" href="http://36kr.com/user/2026524780" target="_blank">阅读更多文章，狠戳这里</a>
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
                                                <h4>拓展阅读</h4>
                                                <ul>
                                                    <li class="top" data-index="1"><a href="http://36kr.com/p/5052642.html?from=related" target="_blank" class="item" data-stat-click="articles.related.1"><span class="desc">期权池的正确打开方式</span></a></li>
                                                    <li class="top" data-index="2"><a href="http://36kr.com/p/5059812.html?from=related" target="_blank" class="item" data-stat-click="articles.related.2"><span class="desc">创业中，如果你想退出怎么办？</span></a></li>
                                                    <li class="top" data-index="3"><a href="http://36kr.com/p/5060592.html?from=related" target="_blank" class="item" data-stat-click="articles.related.3"><span class="desc">2016 年投资方向转变：从商业模式投资转向技术投资</span></a></li>
                                                    <li class="top" data-index="4"><a href="http://36kr.com/p/5060903.html?from=related" target="_blank" class="item" data-stat-click="articles.related.4"><span class="desc">2017年，投资人应关注哪些海外新兴市场？</span></a></li>
                                                    <li class="top" data-index="5"><a href="http://36kr.com/p/5061117.html?from=related" target="_blank" class="item" data-stat-click="articles.related.5"><span class="desc">2016年新三板十大夭折定增：300亿定增一笑而过，“专情”却被放鸽子</span></a></li>
                                                    <li class="top" data-index="6"><a href="http://36kr.com/p/5061121.html?from=related" target="_blank" class="item" data-stat-click="articles.related.6"><span class="desc">去“独角兽”公司工作好不好？</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="sponsor" style="display: none;">
                                            <h5><span>赞助商</span></h5>
                                            <ul class="am-list am-list-static">
                                                <li></li>
                                                <li> </li>
                                                <li> </li>
                                            </ul>
                                        </div>
                                        <div class="next-post-wrapper show">
                                            <h4>下一篇</h4>
                                            <div class="item" data-stat-click="articles.next">
                                                <a href="http://36kr.com/p/5061577.html?from=next" class="title" target="_blank">支付宝回应熟人可修改密码漏洞：仅在特定情况下可行，已提高安全等级</a>
                                                <div class="tags-list">
                                                    <i class="icon-tag"></i>
                                                    <span><a href="http://36kr.com/tag/%E9%87%91%E8%9E%8D" target="_blank">金融</a><span>，</span></span>
                                                    <span><a href="http://36kr.com/tag/%E5%AA%92%E4%BD%93" target="_blank">媒体</a><span>，</span></span>
                                                    <span><a href="http://36kr.com/tag/%E6%94%AF%E4%BB%98%E5%AE%9D" target="_blank">支付宝</a></span>
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
                            <a class="icon-weibo weibo cell" href="http://share.baidu.com/s?type=text&amp;searchPic=1&amp;sign=on&amp;to=tsina&amp;key=595885820&amp;url=http://36kr.com/p/5061570.html&amp;title=%20%E3%80%90%E8%BD%AC%E6%9D%BF%E4%B8%93%E9%A2%98%E6%8A%A5%E5%91%8A%E3%80%91%E6%96%B0%E4%B8%89%E6%9D%BF%E8%BD%AC%E6%9D%BF%E5%A4%A7%E6%BD%AE%EF%BC%9A%E8%AD%A6%E6%83%95%E4%B8%80%E5%93%84%E8%80%8C%E4%B8%8A%E7%9A%84%E9%AB%98%E4%BC%B0%E5%80%BC%E6%8A%95%E8%B5%84%E9%A3%8E%E9%99%A9%20"></a>
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
                <div class="only-article show-model" style="height: 1294px;">
                    <div class="center-content">
                        <div class="content-wrapper">
                            <div class="post-wrapper" id="J_pure_read_5061570">
                                <div class="pure-post">
                                    <div class="article-section">
                                        <h1> {{$article["title"]}} </h1>
                                        <div class="content-font">
                                            <div class="am-cf author-panel">
                                                <div class="author am-fl">
                                                    <a href="/user/2026524780" class="am-fl"><span class="name" >{{$article["author"]["username"]}}</span></a>
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
                                                    <span>http://36kr.com/p/5061570.html</span>
                                                </section>
                                                <section>
                                                    <span>“看完这篇还不够？如果你也在创业，并希望自己的项目被报道，请</span>
                                                    <a href="http://chuang.36kr.com/report#/report/index" target="_blank" rel="nofollow">戳这里</a>
                                                    <span>告诉我们！”</span>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-wrapper" id="J_pure_read_5061577">
                                <div class="pure-post">
                                    <div class="article-section">
                                        <h1>支付宝回应熟人可修改密码漏洞：仅在特定情况下可行，已提高安全等级</h1>
                                        <div class="content-font">
                                            <div class="am-cf author-panel">
                                                <div class="author am-fl">
                                                    <a href="/user/1633539537" class="am-fl"><span class="name" data-stat-click="wenzhang.zuozhexingming">卢晓明</span></a>
                                                    <span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">53分钟前</abbr></span>
                                                    <span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">明星公司</abbr></span>
                                                </div>
                                            </div>
                                            <section class="headimg">
                                                <img src="https://pic.36krcnd.com/avatar/201701/10053355/nnxjbr4d3mmslwqv.png!heading" alt="" />
                                            </section>
                                            <div>
                                                <section class="textblock">
                                                    <p>今日早间，有网友发现了支付宝的一个致命漏洞，熟知你支付宝个人信息的人可以通过“找回密码”功能登录你的支付宝并修改登录密码。</p>
                                                    <p>大致方法是，在登录界面点击“忘记密码”，然后在重置登录密码界面选择无法接收短信（手机不在身边），然后这时候，只需要通过选对一些个人信息，即可“重置登录密码”。</p>
                                                    <p><img alt="支付宝回应熟人可修改密码漏洞：仅在特定情况下可行，已提高安全等级" src="https://pic.36krcnd.com/avatar/201701/10052801/ydrgxyk97gsba26e.jpg!heading" data-img-size-val="1212,1068" \="" /></p>
                                                    <p class="img-desc">选择不通过接受验证码重置密码</p>
                                                    <p>这些个人信息可能是从九个图中选出你的好友、选出你近期购买的物品、选出一个与你有关的地址、填写你的真实姓名和身份证号、或者验证你的银行卡信息等。<br /></p>
                                                    <p><img alt="支付宝回应熟人可修改密码漏洞：仅在特定情况下可行，已提高安全等级" src="https://pic.36krcnd.com/avatar/201701/10053023/2xqok888j7xzrjqp.jpg!heading" data-img-size-val="1224,1068" \="" /></p>
                                                    <p class="img-desc">支付宝会让你选择你的个人相关信息</p>
                                                    <p>这意味着，只要是对账号主人比较熟悉的人，就可以重置其登陆密码。用类似的方法，36氪在成功修改了数个支付宝账号的密码，并登入相应账号。<br /></p>
                                                    <p>支付有时候需要支付密码，但有的账号已经开通了小额免密支付，对于小额支付就不需要输入密码；此外，在线下当面扫码付款的场景中，也是不需要支付密码的。因此，成功修改了密码的人即便不知道支付密码，也可以用修改了密码的账号消费。</p>
                                                    <p>此外，<a href="http://mp.weixin.qq.com/s?__biz=MjM5ODAxMjU2MA==&amp;mid=2649625639&amp;idx=1&amp;sn=b4c90bbe7cd70e910f52588498fddc41&amp;chksm=becb87d889bc0ecee08bf24e19536baf738e61087510ce52b5e0ab49ac34e2513607967fe4ff&amp;mpshare=1&amp;scene=1&amp;srcid=01108abbzZni9ORTlHnNWNix#rd" target="_self">有媒体指出</a>，即便是陌生人，通过上述方式，也有可能碰巧成功选中了购买的商品和朋友。除了以此来进行大额消费之外，也有可能通过此来获取账号信息，或者对支付宝好友实行诈骗。</p>
                                                    <p>此事在网上引起热议，网友们表示希望支付宝尽快完善上述漏洞。<br /></p>
                                                    <p>午间，针对网友们曝出的漏洞，蚂蚁金服安全中心官方微博发布回应称，这一方式仅在特定情况下才会实现，对于无法接收短信或者更换了设备的用户，风控系统会评估过账户安全系数等因素的情况下才会让用户回答问题重置密码。而且，一旦用户支付宝在其他设备被登录，本人设备会收到通知提醒。</p>
                                                    <p>经36氪确认，被修改了密码的支付宝用户，确实表示收到了通知。</p>
                                                    <p>另外，支付宝还表示，为提升用户安全感，在接到网友反映后，今日上午，已经进一步提高了风控系统的安全等级。目前仅在用户自己的手机上，才能通过识别近期购买商品以及识别本人好友来找回登录密码，通过其他手机设备是无法应用这一方式找回登录密码。</p>
                                                    <p><img alt="支付宝回应熟人可修改密码漏洞：仅在特定情况下可行，已提高安全等级" src="https://pic.36krcnd.com/avatar/201701/10052040/xvhlvsnzxbrjdgcg.jpg!heading" data-img-size-val="690,1520" \="" /></p>
                                                    <p class="img-desc">蚂蚁神盾局的回复</p>
                                                </section>
                                                <section class="article-footer-label">
                                                    <span>原创文章，作者：卢晓明</span>
                                                    <span>，如若转载，请注明出处：</span>
                                                    <span>http://36kr.com/p/5061577.html</span>
                                                </section>
                                                <section>
                                                    <span>“看完这篇还不够？如果你也在创业，并希望自己的项目被报道，请</span>
                                                    <a href="http://chuang.36kr.com/report#/report/index" target="_blank" rel="nofollow">戳这里</a>
                                                    <span>告诉我们！”</span>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="loading_article">
                                <div>
                                    <div class="circle">
                                        <i class="icon-loading"></i>
                                    </div>
                                    <b>加载中</b>
                                </div>
                            </div>
                        </div>
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