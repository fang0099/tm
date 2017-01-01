@extends("front.master")
@section("content")
    <main class="main-container ng-scope" ng-view="">
        <div ng-show="recommendColumnsInited &amp;&amp; recommendPostsInited" class="ng-scope">
            <div class="top">
                <h1>链媒体
                    <span class="bull">·</span>专栏</h1>
                <h2>随心写作，自由表达</h2>
                <a href="<?php echo env('APP_URL');?>/article/edit" class="btn btn-black write-btn">开始写文章</a></div>
            <section class="l-receptacle">
                <h3>
                    <span>标签 · 发现</span>
                </h3>
                <ul class="column-card-list clearfix">
                    @foreach($tags as $tag)
                        <li class="column-card-item ng-scope">
                            <p class="avatar">
                                <a href="<?php echo env('APP_URL');?>/article/list?type=tag&id={{$tag["id"]}}">
                                    <img alt="" src="{{$tag["face"]}}">
                                </a>
                            </p>
                            <p class="title">
                                <a href="<?php echo env('APP_URL');?>/article/list?type=tag&id={{$tag["id"]}}" class="ng-binding">{{$tag["name"]}}</a></p>
                            <p class="description">
                                <a href="<?php echo env('APP_URL');?>/article/list?type=tag&id={{$tag["id"]}}" class="ng-binding">{{$tag["brief"]}}</a></p>
                            <p class="meta ng-binding">{{$tag["subscriberCount"]}} 人关注
                                <span class="split"> | </span>{{$tag["articleCount"] }} 篇文章</p>
                            <a class="btn btn-green btn-90_32" href="<?php echo env('APP_URL');?>/article/list?type=tag&id={{$tag["id"]}}">进入页面</a>
                        </li>
                    @endforeach
                </ul>
              <!--  <p class="random">
                    <a class="btn btn-black btn-90_32" href="javascript:;" id="get_tag_btn">
                        <i class="icon-ic_refresh"></i>换一换</a>
                </p>-->
            </section>
            <section class="l-receptacle">
                <h3>
                    <span>作者 · 发现</span>
                </h3>
                <ul class="column-card-list clearfix">
                    @foreach($users as $user)
                        <li class="column-card-item ng-scope">
                            <p class="avatar">
                                <a href="<?php echo env('APP_URL');?>/article/list?id={{$user["id"]}}">
                                    <img alt="" src="{{$user["avatar"]}}"></a>
                            </p>
                            <p class="title">
                                <a href="<?php echo env('APP_URL');?>/article/list?id={{$user["id"]}}" class="ng-binding">{{$user["username"]}}</a></p>
                            <p class="description">
                                <a href="<?php echo env('APP_URL');?>/article/list?id={{$user["id"]}}" class="ng-binding">{{$user["brief"]}}</a></p>
                            <p class="meta ng-binding">{{$user["followersCount"]}} 人关注
                                <span class="split"> | </span>{{$user["articlesCount"]}} 篇文章</p>
                            <a class="btn btn-green btn-90_32" href="<?php echo env('APP_URL');?>/article/list?id={{$user["id"]}}">进入页面</a>
                        </li>
                    @endforeach
                </ul>
              <!--  <p class="random">
                    <a class="btn btn-black btn-90_32" href="javascript:;" id="get_user_btn">
                        <i class="icon-ic_refresh"></i>换一换</a>
                </p>-->
            </section>
            <section class="l-receptacle">
                <h3><span>文章 · 发现</span></h3>
                <input id="page_count" value="1" style="display: none;">
                <ul class="post-card-list clearfix">
                    @foreach($articles as $article)
                        <li class="post-card-item ng-scope">
                            <a ui-open-blank="" href="article?id={{$article["id"]}}">
                                <p class="post-img ng-scope" ng-if="post.titleImage" ng-style="{&#39;background-image&#39;: &#39;url(&#39;+ (post.titleImage | imgSize: &#39;b&#39;) +&#39;)&#39;}" style="background-image: url(&quot;{{$article["face"]}}&quot;);"></p>
                                <p class="title ng-binding">{{$article["title"]}}</p>
                                <p class="content ng-binding ng-hide">{{$article["abstracts"]}}…
                                    <span class="read-all">查看全文
                                <i class="icon-ic_unfold"></i></span>
                                </p>
                            </a>
                            <p class="meta">
                        <span class="author ellipsis">
                        <a target="_blank" href="article/list?id={{$article["author"]["id"]}}" class="ng-binding">{{$article["author"]["username"]}}</a>
                        </span><span class="source ellipsis ng-scope">发表于
                        <a ui-open-blank="" href="article?id={{$article["id"]}}" class="ng-binding">{{$article["publish_time"]}}</a></span>
                            </p>
                        </li>
                    @endforeach
                </ul>
              <!--  <p class="random">
                    <a class="btn btn-black btn-90_32" href="javascript:;" id="get_article_btn">
                      <i class="icon-ic_refresh"></i>换一换</a>
                </p>-->
            </section>
            <div class="bottom">
                <h3>在链媒体创作</h3>
                <!--<a ng-click="handleLoginBeforeJump($event, true)" class="btn btn-black" href="https://zhuanlan.zhihu.com/request">申请专栏</a>-->
                <p class="copyright">
                    <a ui-open-blank="" href="" class="about">关于专栏</a>
                    <span>©️2016 链媒体</span></p>
            </div>
        </div>
    </main>
@stop
@section("page_level_js")

    <script>
        $(window).scroll(function(){
            var scrollTop = $(this).scrollTop();
            var scrollHeight = $(document).height();
            var windowHeight = $(this).height();
            if(scrollTop + windowHeight == scrollHeight){
                count = parseInt($("#page_count").val());
                count +=1;
                $("#page_count").val(count);
                console.log(count);

                html = "";

                $.ajax({
                    type: "GET",
                    url: "http://localhost/tm/web/public/article/ajax_article_list?page="+count,
                    data: {username:$("#username").val(), content:$("#content").val()},
                    dataType: "json",
                    success: function(data){
                        //alert("1");
                        console.log(eval(data));

                        $.each(data["list"], function (index, article) {
                            html+= "<li class=\"post-card-item ng-scope\">"+
                                "<a ui-open-blank=\"\" href=\"article?id="+article["id"]+"\">"+
                                "<p class=\"post-img ng-scope\" style=\"background-image: url(&quot; "+ article["face"]+" &quot;);\"></p>"+
                                "<p class=\"title ng-binding\">"+article["title"]+"</p>"+
                                "<p class=\"content ng-binding ng-hide\">"+article["abstracts"]+"…"
                                "<span class=\"read-all\">查看全文<i class=\"icon-ic_unfold\"></i></span></p></a><p class=\"meta\"><span class=\"author ellipsis\">"+
                                "<a target=\"_blank\" href=\"article/list?id="+article["author"]["id"]+"\" class=\"ng-binding\">"+article["author"]["username"]+"</a>"+
                                "</span><span class=\"source ellipsis ng-scope\">发表于"+
                                "<a href=\"article?id="+article["id"]+"\" class=\"ng-binding\">"+article["publish_time"]+"</a></span></p></li>";

                        });
                        $(".post-card-list").html($(".post-card-list").html()+ html);

                        //console.log(eval(data));
                        /*
                         $('#resText').empty();   //清空resText里面的所有内容
                         var html = '';
                         $.each(data, function(commentIndex, comment){
                         html += '<div class="comment"><h6>' + comment['username']
                         + ':</h6><p class="para"' + comment['content']
                         + '</p></div>';
                         });
                         $('#resText').html(html);*/
                    },
                    error: function(data)
                    {
                        console.log(eval(data));
                    }
                });

                //$(".items").html($(".items").html()+html);
            }
        });
    </script>

    @stop