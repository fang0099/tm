@extends("front.master")
@section("content")
    <main class="main-container ng-scope" ng-view="">
        <div ng-show="recommendColumnsInited &amp;&amp; recommendPostsInited" class="ng-scope">
            <div class="top">
                <h1>贝塔区块链
                    <span class="bull">·</span>专栏</h1>
                <h2>随心写作，自由表达</h2>
                <a href="<?php echo env('APP_URL');?>/article/edit" class="btn btn-black write-btn">开始写文章</a></div>
            <input style="display:none;" id="page_count" value="1" />
            <div class="grid grid-pad" style="background-color: #ffffff; padding-top: 46px; margin-top: 20px;">
                <div class="col-8-12 mobile-col-1-1">
                    <div class="content">
                        <div class="items-container ng-scope ui-infinite" ui-infinite="" data-source="postsSource" ng-if="postsSource" ng-hide="!postsSource.pending &amp;&amp; !posts.length &amp;&amp; !recommendPosts.length">

                            <div class="block-title ng-scope" ng-class="scope.help &amp;&amp; block-title-help" ng-show="posts.length" ng-if="!currentAuthor">
                      <span ng-transclude="">
                        <span class="ng-binding ng-scope">最新文章</span></span>
                            </div>
                            <ul class="items" id="article_items" ng-show="posts.length">
                                @foreach($articles as $article)
                                    <li class="item ng-isolate-scope
                            @if($article["face"]!="default" and $article["face"]!="123")
                                            item-with-title-img
                                        @else
                                            item-without-title-img
                                        @endif
                                            " ng-class="itemClass" ng-repeat="post in posts track by $index" post="post" column="column">
                                        <article class="hentry">
                                            <a href="<?php echo env('APP_URL');?>/article?id={{$article["id"]}}" class="entry-link">
                                                <h1 class="entry-title ng-binding">{{$article["title"]}}</h1>
                                                <div class="title-img-container ng-scope" ng-if="titleImageShow">
                                                    <div class="title-img-preview" ng-style="{&#39;background-image&#39;: &#39;url(&#39; + {{$article["title"]}} + &#39;)&#39;}" style="background-image: url(&quot;{{$article["face"]}}&quot;);"></div>
                                                </div>
                                                <section class="entry-summary">
                                                    <p ui-summary="post.content" max="truncateMax" class="ng-isolate-scope"> {{$article["abstracts"]}}…
                                                        <span class="read-all">查看全文
                                                <i class="icon-ic_unfold"></i>
                                            </span>
                                                    </p>
                                                </section>
                                            </a>
                                            <footer>
                                                <div class="entry-meta">
                                                    <time ng-class="{short: timeStyle == &#39;short&#39;}" ui-hover-title="2016 年 11 月 12 日星期六晚上 11 点 54 分" ui-time="" datetime="2016-11-12T23:54:39+08:00" class="published ng-binding ng-isolate-scope hover-title">{{$article["publish_time"]}}</time>
                                                </div>
                                                <div class="entry-func ng-scope" ng-if="!showSource">
                                                    <a href="https://zhuanlan.zhihu.com/p/23620302" class="vote-num ng-binding" ng-show="post.likesCount">{{$article["likes"]}}
                                                        <span>赞</span></a>
                                                    <span ng-show="post.likesCount &amp;&amp; post.commentsCount" class="bull">·</span>
                                                    <a href="https://zhuanlan.zhihu.com/p/23620302#comments" class="comment ng-binding" ng-show="post.commentsCount">{{$article["comment_num"]}}
                                                        <span>条评论</span></a>
                                                </div>
                                            </footer>
                                        </article>
                                    </li>
                                @endforeach

                            </ul>
                            <div class="posts-end" ng-show="posts.length &amp;&amp; postsSource.completed">
                                <i class="icon-ic_column_end"></i>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-4-12 mobile-col-1-1 hide-on-mobile">
                    <div class="content">
                        <div class="block-title ng-scope" ng-class="scope.help &amp;&amp; block-title-help" ng-show="posts.length" ng-if="!currentAuthor">
                              <span ng-transclude="">
                                <span class="ng-binding ng-scope">热门标签</span></span>
                        </div>

                        <div class="column-about" ng-switch="columnType == 'user'" >
                            <div class="tags ng-scope" ng-if="!currentAuthor &amp;&amp; column.postTopics.length">
                               <span ng-if="isShowMoreTopics" class="main_page ng-scope">
                                    @foreach($tags as $tag)
                                    <a class="tag ng-binding ng-scope">{{$tag["name"]}}</a>
                                        @endforeach
                                </span>
                           </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="block-title ng-scope" ng-class="scope.help &amp;&amp; block-title-help" ng-show="posts.length" ng-if="!currentAuthor">
                                <span ng-transclude="">
                                <span class="ng-binding ng-scope">7 * 24 快讯</span></span>
                        </div>
                        <div class="draft-items-container settings-posts-container ui-infinite" ui-infinite="" data-source="draftsSource">
                            <ul class="items draft-list" ng-show="drafts.length">
                                <li class="item fx-draft-item-fade ng-scope" ng-repeat="draft in drafts">
                                    <div class="entry-title"><a href="/p/24635138/edit" class="ng-binding">滴滴答答滴滴答答的的滴滴答答滴滴答答的的滴滴答答滴滴答答的的滴滴答答滴滴答答</a></div>
                                    <div class="entry-meta">
                                        <time ng-class="{short: timeStyle == 'short'}" ui-hover-title="2016 年 12 月 30 日星期五早上 4 点 08 分" ui-time="" datetime="2016-12-30T04:08:45+08:00" class="updated ng-binding ng-isolate-scope hover-title">2 天前</time>
                                    </div>
                                </li><li class="item fx-draft-item-fade ng-scope" ng-repeat="draft in drafts">
                                    <div class="entry-title"><a href="/p/24635100/edit" class="ng-binding">dsadsa</a></div>
                                    <div class="entry-meta">
                                        <time ng-class="{short: timeStyle == 'short'}" ui-hover-title="2016 年 12 月 30 日星期五早上 3 点 39 分" ui-time="" datetime="2016-12-30T03:39:09+08:00" class="updated ng-binding ng-isolate-scope hover-title">2 天前</time>
                                    </div>
                                </li><li class="item fx-draft-item-fade ng-scope" ng-repeat="draft in drafts">
                                    <div class="entry-title"><a href="/p/24597559/edit" class="ng-binding">3</a></div>
                                    <div class="entry-meta">
                                        <time ng-class="{short: timeStyle == 'short'}" ui-hover-title="2016 年 12 月 28 日星期三早上 2 点 44 分" ui-time="" datetime="2016-12-28T02:44:56+08:00" class="updated ng-binding ng-isolate-scope hover-title">4 天前</time>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



    <!--        <section class="l-receptacle">
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
            </section>-->
            <div class="bottom">
                <h3>在贝塔区块链创作</h3>
                <!--<a ng-click="handleLoginBeforeJump($event, true)" class="btn btn-black" href="https://zhuanlan.zhihu.com/request">申请专栏</a>-->
                <p class="copyright">
                    <a ui-open-blank="" href="" class="about">关于专栏</a>
                    <span>©️2016 贝塔区块链</span></p>
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
                    url: "<?php echo env('APP_URL');?>/article/ajax_article_list?page="+count,
                    data: {username:$("#username").val(), content:$("#content").val()},
                    dataType: "json",
                    success: function(data){
                        //alert("1");
                        console.log(eval(data));

                        $.each(data["list"], function (index, article) {

                            if (article["face"] == "default")
                            {
                                html+= "<li class=\"item ng-isolate-scope item-without-title-img\" ng-class=\"itemClass\">";
                            }
                            else
                            {
                                html+= "<li class=\"item ng-isolate-scope item-with-title-img\" ng-class=\"itemClass\">";
                            }


                            html+= "<article class=\"hentry\">"+
                                "<a href=\"<?php echo env('APP_URL');?>/article?id="+article["id"]+"\" class=\"entry-link\">"+
                                "<h1 class=\"entry-title ng-binding\">"+article["title"]+"</h1>"+
                                "<div class=\"title-img-container ng-scope\" ng-if=\"titleImageShow\">"+
                                "<div class=\"title-img-preview\" style=\"background-image: url(&quot; "+article["face"]+" &quot;);\"></div>"+
                                "</div>"+
                                "<section class=\"entry-summary\">"+
                                "<p ui-summary=\"post.content\" max=\"truncateMax\" class=\"ng-isolate-scope\"> "+article["abstracts"]+"…"+
                                "<span class=\"read-all\">查看全文"+
                                "<i class=\"icon-ic_unfold\"></i></span></p></section></a><footer>"+
                                "<div class=\"entry-meta\"><time class=\"published ng-binding ng-isolate-scope hover-title\">"+article["publish_time"]+"</time></div>"+
                                "<div class=\"entry-func ng-scope\">"+
                                "<a href=\"#\" class=\"vote-num ng-binding\">"+article["likes"]+
                                "<span>赞</span></a>"+
                                "<span class=\"bull\">·</span>"+
                                "<a href=\"#\" class=\"comment ng-binding\" ng-show=\"post.commentsCount\">"+article["comment_num"]+
                                "<span>条评论</span></a>"+
                                "</div></footer></article></li>"


                        });
                        $("#article_items").html($("#article_items").html()+ html);

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
                /*$.ajax({
                    type: "GET",
                    url: "<?php echo env('APP_URL');?>/article/ajax_article_list?page="+count,
                    data: {username:$("#username").val(), content:$("#content").val()},
                    dataType: "json",
                    success: function(data){
                        //alert("1");
                        console.log(eval(data));

                        $.each(data["list"], function (index, article) {
                            html+= "<li class=\"post-card-item ng-scope\">"+
                                "<a ui-open-blank=\"\" href=\"<?php echo env('APP_URL');?>/article?id="+article["id"]+"\">"+
                                "<p class=\"post-img ng-scope\" style=\"background-image: url(&quot; "+ article["face"]+" &quot;);\"></p>"+
                                "<p class=\"title ng-binding\">"+article["title"]+"</p>"+
                                "<p class=\"content ng-binding ng-hide\">"+article["abstracts"]+"…"+
                                "<span class=\"read-all\">查看全文<i class=\"icon-ic_unfold\"></i></span></p></a><p class=\"meta\"><span class=\"author ellipsis\">"+
                                "<a target=\"_blank\" href=\"<?php echo env('APP_URL');?>/article/list?id="+article["author"]["id"]+"\" class=\"ng-binding\">"+article["author"]["username"]+"</a>"+
                                "</span><span class=\"source ellipsis ng-scope\">发表于"+
                                "<a href=\"<?php echo env('APP_URL');?>/article?id="+article["id"]+"\" class=\"ng-binding\">"+article["publish_time"]+"</a></span></p></li>";

                        });
                        $(".post-card-list").html($(".post-card-list").html()+ html);

                        //console.log(eval(data));

                    },
                    error: function(data)
                    {
                        console.log(eval(data));
                    }
                });*/

                //$(".items").html($(".items").html()+html);
            }
        });
    </script>

    @stop