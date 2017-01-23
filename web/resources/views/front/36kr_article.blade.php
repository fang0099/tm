<!DOCTYPE html>
<html lang="zh-CN" class="">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> {{$article["title"]}}_文章 </title>
    <meta property="og:type" content="article" />
    <meta property="og:title" content=" {{$article["title"]}} " />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit" />
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
    <link href="<?php echo env('APP_URL');?>/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />

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
    <script src="<?php echo env('APP_URL');?>/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
    <script src="<?php echo env('APP_URL');?>/assets/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/jquery-comments/css/jquery-comments.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Data -->
    <script type="text/javascript" src="<?php echo env('APP_URL');?>/jquery-comments/data/comments-data.js"></script>

    <!-- Libraries -->
   <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.textcomplete/1.8.0/jquery.textcomplete.js"></script>
    <script type="text/javascript" src="<?php echo env('APP_URL');?>/jquery-comments/js/jquery-comments.js"></script>


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
                width: 55, //宽度
                height:55, //高度
                text: window.location.href //任意内容
            });
            $('.back').click(function(){
                scroll(0,0);
            });

        });
    </script>
    <script type="text/javascript">
        function new_comment(data)
        {
            var userid = $("#the_user_id").val();
            if (userid == "" || userid==null)
            {
                window.location.href="/account#login";
            }
            $.ajax(
                {
                    url:"<?php echo env('APP_URL');?>/article/comment",
                    data: {
                        comment_content: data["content"],
                        article_id:{{$article["id"]}},
                        parent:data["parent"],
                    },
                    type: "POST",

                    success:function(result){
                        console.log(result);
                        //var json_data = JSON.parse(result);
                        //commentsArray2 = json_data["data"];
                        //console.log(json_data);
                    }
                });
        }

        function update_comment(data)
        {
            $.ajax(
                {
                    url:"<?php echo env('APP_URL');?>/comment/update",
                    data: {
                        comment_content: data["content"],
                        article_id:{{$article["id"]}},
                        parent:data["parent"],
                        id:data["id"],
                    },
                    type: "POST",

                    success:function(result){
                        console.log(result);
                        //var json_data = JSON.parse(result);
                        //commentsArray2 = json_data["data"];
                        //console.log(json_data);
                    }
                });
        }

        function edit_comment(data)
        {
            $.ajax(
                {
                    url:"<?php echo env('APP_URL');?>/article/comment",
                    data: {
                        comment_content: data["content"],
                        article_id:{{$article["id"]}},
                    },
                    type: "POST",

                    success:function(result){
                        console.log(result);
                        //var json_data = JSON.parse(result);
                        //commentsArray2 = json_data["data"];
                        //console.log(json_data);
                    }
                });
        }

        function guanzhu(id)
        {
            console.log(id);
            $.ajax(
                {
                    url:"/user/follow_ajax",
                    data: {
                        id: id,
                    },
                    type: "get",
                    success:function(result){
                        toastr.success("关注成功");
                        $("#guanzhu_user").text("已关注");
                        console.log(result);
                        //var json_data = JSON.parse(result);
                        //commentsArray2 = json_data["data"];
                        //console.log(json_data);
                    }
                });
        }

        function delete_comment(data)
        {
            $.ajax(
                {
                    url:"<?php echo env('APP_URL');?>/article/comment_delete",
                    data: {
                        comment_id: data["id"],
                        article_id:{{$article["id"]}},
                    },
                    type: "GET",

                    success:function(result){
                        console.log(result);
                    }
                });
        }

        function up_comment(data)
        {
            $.ajax(
                {
                    url:"<?php echo env('APP_URL');?>/comment/up",
                    data: {
                        comment_id: data["id"],
                        //article_id:{{$article["id"]}},
                    },
                    type: "GET",

                    success:function(result){
                        console.log(result);
                    }
                });
        }

        $(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "1000",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            $('#like_btn').click(function(){

                var userid = $("#the_user_id").val();
                if (userid == "" || userid==null)
                {
                    window.location.href="/account#login";
                }

                var article_id=$('#like_btn').attr("article_id");
                console.log($("#like_btn").attr("count"));
                old = parseInt($("#like_btn").attr("count"))+1;

                $("#the_like_count").html(old);
                console.log(article_id);
                $.ajax({
                    type: "GET",
                    url: "<?php echo env('APP_URL');?>/article/like?id="+article_id,
                    data: {username:$("#username").val(), content:$("#content").val()},
                    dataType: "json",
                    success: function(data){
                        console.log(eval(data));
                        toastr.success("喜欢成功");
                    },
                    error: function(data)
                    {
                        console.log(eval(data));
                    }
                });
            });

            $("#guanzhu_user").click(function()
            {
                var userid = $("#the_user_id").val();
                if (userid == "" || userid==null)
                {
                    window.location.href="/account#login";
                }
                var id = $("#author_id").val();
                guanzhu(id);
            });

            $(".follow").click(function(){
                $(this).parent().addClass("current");
            });

            $(".unfollow").click(function(){
                $(this).parent().removeClass("current");

            });

            $('#collect_btn').click(function(){
                var userid = $("#the_user_id").val();
                if (userid == "" || userid==null)
                {
                    window.location.href="/account#login";
                }
                old = parseInt($("#collect_btn").attr('count'))+1;
                $.ajax({
                    type: "GET",
                    url: "<?php echo env('APP_URL');?>/article/collect?id="+$('#collect_btn').attr("article_id"),
                    data: {username:$("#username").val(), content:$("#content").val()},
                    dataType: "json",
                    success: function(data){
                        $("#collect_btn_count").html(old);
                        toastr.success("收藏成功");
                        console.log(eval(data));
                    },
                    error: function(data)
                    {
                        console.log(eval(data));
                    }
                });
            });


            var saveComment = function(data) {

                // Convert pings to human readable format
                $(data.pings).each(function(index, id) {
                    var user = usersArray.filter(function(user){return user.id == id})[0];
                    data.content = data.content.replace('@' + id, '@' + user.fullname);
                });
                //console.log(data);
                return data;
            }


            //var commentsArrays
            $('#comments-container').comments({
                profilePictureURL: '<?php echo session("avatar");?>',
                currentUserId: <?php if(null!=session("id")) {echo session("id");} else{echo -1;}?>,
                roundProfilePictures: true,
                textareaRows: 1,
                enableAttachments: false,
                enableHashtags: true,
                enablePinging: true,
                getUsers: function(success, error) {
                    setTimeout(function() {
                        success(usersArray);
                    }, 500);
                },
                getComments: function(success, error) {
                    var commentsArray2 = [];
                    $.ajax({url:"<?php echo env('APP_URL');?>/article/ajax_comment_list?article_id={{$article["id"]}}",
                        success:function(result){
                            console.log(result);
                            var json_data = JSON.parse(result);
                            commentsArray2 = json_data["data"];
                            //console.log(json_data);
                            success(commentsArray2);
                        }});

                    setTimeout(function() {
                        //success(commentsArray2);
                    }, 1000);
                },
                postComment: function(data, success, error) {
                    console.log(data);
                    new_comment(data);

                    setTimeout(function() {
                        success(saveComment(data));
                    }, 500);
                },
                putComment: function(data, success, error) {
                    console.log(data);
                    update_comment(data);
                    setTimeout(function() {
                        success(saveComment(data));
                    }, 500);
                },
                deleteComment: function(data, success, error) {
                    console.log(data);
                    delete_comment(data);
                    setTimeout(function(data) {
                        console.log(data);
                        success();
                    }, 500);
                },
                upvoteComment: function(data, success, error) {
                    up_comment(data);
                    setTimeout(function() {
                        success(data);
                    }, 500);
                },
                uploadAttachments: function(dataArray, success, error) {
                    setTimeout(function() {
                        success(dataArray);
                    }, 500);
                },
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
            <input style="display:none;" id="author_id" value="{{$article["author"]["id"]}}"/>
            <input style="display:none;" id="the_user_id" value="{{session("id")}}"/>
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
                                                            <span class="name" data-stat-click="wenzhang.zuozhexingming">{{$article["author"]["username"]}} </span></a>
                                                        <span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">{{$article["publish_time"]}} </abbr></span>
                                                        <span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">字数: {{$article["word_count"]}} </abbr></span>
                                                        <span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">阅读时长: {{$article["readTime"]}} 分钟 </abbr></span>
                                                        <span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">热度: {{$article["hot_num"]}} </abbr></span>
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
                                                    @if(isset($article["copyright"]) and $article["copyright"]==1)
                                                    <section class="article-footer-label">
                                                        <span>原创文章，作者：{{$article["author"]["username"]}}</span>
                                                        <span>，如若转载，请注明出处：</span>
                                                        <span><?php echo env('APP_URL');?>article?id={{$article["id"]}}</span>
                                                    </section>
                                                        @endif
                                                </div>
                                                <section class="ad" id="AD5061570" data-id="16"></section>
                                                <section class="single-post-tags">
                                                    @foreach($article["tags"] as $tag)
                                                        <span class="tag">
                                                            <a target="_blank" href="<?php echo env('APP_URL');?>/article/list?type=tag&id={{$tag["id"]}}" class="tag-a">{{$tag["name"]}}</a>
                                                            <span class="gap-line">|</span> <span class="act follow">+</span>
                                                            <span class="act unfollow">-</span>
                                                        </span>
                                                    @endforeach


                                                </section>
                                                <div class="fav-wrapper">
                                                    <div class="common-post-like-wrapper" data-stat-click="article.like.5061756">
                                                        <a class="post-pc-like" count="{{$article["likes"]}}" article_id="{{$article["id"]}}" id="like_btn" style="text-decoration: none;">
                                                            <span class="icon-ic_like"></span>
                                                            <span style="margin-left: 4px;">
                                                                喜欢
                                                                <span class="total-count-box"><!-- react-text: 629 -->(<!-- /react-text --><b id="the_like_count">{{$article["likes"]}}</b><!-- react-text: 631 -->)<!-- /react-text --></span>
                                                            </span>
                                                        </a>
                                                        <span class="count-box">
                                                            <span class="count kr-animated ">+1</span>
                                                        </span>
                                                    </div>

                                                </div>

                                                <div class="share-nav">
                                                    <div class="inner fixed" style="width: 720px;z-index:10;">
                                                        <div class="box am-cf">
                                                            <div class="share-author am-cf am-fl">
                                                                <a href="<?php echo env('APP_URL');?>/article/list?id={{$article["author"]["id"]}}">
                                                                    <img class="avatar" data-stat-click="wenzhang.share.zuozhetouxiang" src="{{$article["author"]["avatar"]}}" alt="" />
                                                                    <span class="name" data-stat-click="wenzhang.share.zuozhexingming">{{$article["author"]["username"]}}</span>
                                                                </a>
                                                                <a href="javascript:;" id="guanzhu_user" class="btn" style="float:right;margin-top: 5px;margin-left: 8px;">关注作者</a>
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
                                                                <a class="icon-weibo weibo cell" target="_blank" data-stat-click="webtoolbar.weibo" href="http://share.baidu.com/s?type=text&amp;searchPic=1&amp;sign=on&amp;to=tsina&amp;key=595885820&amp;url=<?php echo env('APP_URL');?>article?id={{$article["id"]}}&amp;title={{$article["title"]}}"></a>
                                                            </div>
                                                            <div class="user-ctrl ctrl-box am-fr">

                                                                <!--<span data-stat-click="webtoolbar.favorite" class="icon-collect-min cell"></span>-->
                                                                <span id="collect_btn" article_id="{{$article["id"]}}" data-stat-click="webtoolbar.favorite" class="icon-collect-min cell"></span>
                                                                <a data-stat-click="webtoolbar.comment" class="icon-thumbs-up cell"></a>
                                                                <a href="#comment_achor" data-stat-click="webtoolbar.comment" class="icon-comment-min cell"></a>
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
                                                        <p class="name"><a href="<?php echo env('APP_URL');?>/article/list?id={{$article["author"]["id"]}}" target="_blank">{{$article["author"]["username"]}}</a><!--<span class="kr-tag-arrow-blue kr-size-min"><span class="arrow"><em></em></span><span></span></span>--></p>
                                                        <p class="intro">{{$article["author"]["brief"]}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div></div>
                                        <div class="mobile_article">
                                            <a style="display:block;" name="comment_achor"></a>
                                            <div id="comments-container"></div>
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
                                                 共发表
                                                {{$author["articlesCount"]}}
                                                篇
                                            </span>
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

                                        <!--<div class="sponsor" style="display: block;">
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
                                        </div>-->
                                        @if(isset($next_article["id"]))
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
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="share-nav-h5">
                <div class="inner" style="z-index:10;">
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

            <div class="article-detail" id="readmode_win" style="display:none;position: relative; z-index: 1111;">
                <a class="am-icon-reply back-to-normal"></a>
                <div class="only-article-shadow show-model"></div>
                <div class="only-article show-model" style="height: 1094px; display: block;">
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
                                                    <span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">字数: {{$article["word_count"]}} </abbr></span>
                                                    <span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">阅读时长: {{$article["readTime"]}} 分钟</abbr></span>
                                                    <span class="time am-fl"><span class="dot">&nbsp;•&nbsp;</span><abbr class="time">热度: {{$article["hot_num"]}}</abbr></span>
                                                </div>
                                            </div>
                                            <section class="headimg">
                                                <img src="{{$article["face"]}}" alt="{{$article["title"]}}" />
                                            </section>
                                            <div>
                                                <section class="textblock">
                                                    {!! $article["content"] !!}
                                                </section>
                                                @if(isset($article["copyright"]) and $article["copyright"]==1)
                                                <section class="article-footer-label">
                                                    <span>原创文章，作者：{{$article["author"]["username"]}}</span>
                                                    <span>，如若转载，请注明出处：</span>
                                                    <span><?php echo env('APP_URL');?>/article?id={{$article["id"]}}</span>
                                                </section>
                                                @endif
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