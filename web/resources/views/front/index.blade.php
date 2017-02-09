@extends("front.master")
@section("page_level_css")
    <link type="text/css" rel="stylesheet" href="responsive-tabs_/css/responsive-tabs.css" />
    <link type="text/css" rel="stylesheet" href="responsive-tabs/css/style.css" />

    <link href="./final2/css/36kr_common.css" rel="stylesheet" />
    <link rel="stylesheet" href="./final2/css/36kr_style.css" />
    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/zhuanlan/css/mine.css">
    <link href="./final2/css/36kr_app.css" rel="stylesheet" />
    <!--<link href="/csstab/css/style.css" rel="stylesheet" />-->
    @stop
@section("content")
    <main class="main-container ng-scope" ng-view="">
        <div ng-show="recommendColumnsInited &amp;&amp; recommendPostsInited" class="ng-scope">
            <input style="display:none;" id="page_count" value="1" />
            <div class="grid grid-pad" style="background-color: #ffffff; padding-top: 16px; margin-top: 0px;">
                <div class="col-8-12 mobile-col-1-1">
                    <div id="responsiveTabsDemo" >
                        <!--<h3><span>最新文章</span></h3>-->
                        @if(null==session("username"))
                            <ul class="mod-tit" style="padding-bottom:10px; margin-bottom: 25px;">
                                <li ><a id="the_newest" class="" href="#tab-1">最新</a></li>&nbsp;|&nbsp;
                                <li><a class="" href="#tab-2">最热 </a></li>&nbsp;|&nbsp;
                                <li><a id="the_sugg" href="#tab-3">推荐</a></li>
                            </ul>
                            <!--<a class="" href="<?php echo env('APP_URL');?>/suggestion_tag">推荐</a>-->
                        @else
                            <ul class="mod-tit" style="padding-bottom:10px; margin-bottom: 25px;">
                                <li ><a id="the_newest" class="" href="#tab-1">最新</a></li>&nbsp;|&nbsp;
                                <li><a class="" href="#tab-2">最热 </a></li>&nbsp;|&nbsp;
                                <li><a class="" href="#tab-3">推荐</a></li>
                            </ul>
                        @endif

                        <div id="tab-1">
                            <div class="content">
                                <div class="items-container ng-scope ui-infinite">

                                    <ul class="items" id="article_items" ng-show="posts.length">
                                        @foreach($articles as $article)
                                            <li class="item ng-isolate-scope
                                                @if($article["face"]!="default" and $article["face"]!="123")
                                                    item-with-title-img
                                                @else
                                                    item-with-title-img
                                                @endif
                                                    " ng-class="itemClass" ng-repeat="post in posts track by $index" post="post" column="column">
                                                <article class="hentry">
                                                    <a href="<?php echo env('APP_URL');?>/article?id={{$article["id"]}}" class="entry-link">
                                                        <h1 class="entry-title ng-binding">{{$article["title"]}}</h1>
                                                        <div class="title-img-container ng-scope" ng-if="titleImageShow">
                                                            <div class="title-img-preview" ng-style="{&#39;background-image&#39;: &#39;url(&#39; + {{$article["title"]}} + &#39;)&#39;}" style="background-image: url(&quot;{{$article["face"]}}&quot;);"></div>
                                                        </div>
                                                        <div class="entry-meta" style="margin-bottom: 5px;">
                                                            <i class="icon-x" style=""></i>
                                                            @if(isset($article["author"]["username"]))
                                                            <a href="<?php echo env('APP_URL');?>/article/list?id={{$article["author"]["id"]}}" class="vote-num ng-binding" ng-show="post.likesCount" style="color:#21B890;">

                                                                <span>{{$article["author"]["username"]}}</span></a>
                                                                @endif
                                                            <span ng-show="post.likesCount &amp;&amp; post.commentsCount" class="bull">·</span>
                                                            <time ng-class="{short: timeStyle == &#39;short&#39;}" ui-hover-title="2016 年 11 月 12 日星期六晚上 11 点 54 分" ui-time="" datetime="2016-11-12T23:54:39+08:00" class="published ng-binding ng-isolate-scope hover-title">{{$article["publish_time"]}}</time>
                                                            <div class="entry-func ng-scope" style="float:right; display:inline;position: relative;">

                                                                <!--<i class="icon-thumbs-up"></i>

                                                                <a href="#" class="vote-num ng-binding" ng-show="post.likesCount">{{$article["likes"]}}
                                                                    <span></span></a>-->
                                                                    <i class="icon-fire"></i>


                                                                <a href="#comments" style="display: inline-block;" class="comment ng-binding" ng-show="post.commentsCount">{{$article["hot_num"]}}
                                                                    <span></span></a>
                                                            </div>

                                                        </div>


                                                        <section class="entry-summary">
                                                            <p ui-summary="post.content" max="truncateMax" class="ng-isolate-scope"> {{strip_tags($article["content"])}}…

                                                            </p>
                                                        </section>
                                                        <section class="entry-summary">
                                                        <div class="tag_index">
                                                            <i class="icon-tags" ></i>
                                                            @if(isset($article["tagList"]))
                                                                @foreach($article["tagList"] as $tag)
                                                                    <a class="" style="display: inline-block;position: relative;margin-top: 5px;" href="article/list?type=tag&id={{$tag["id"]}}">{{$tag["name"]}}</a>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        </section>

                                                    </a>

                                                </article>
                                            </li>

                                        @endforeach

                                    </ul>
                                    <div class="posts-end" ng-show="posts.length &amp;&amp; postsSource.completed">
                                       <!-- <i class="icon-ic_column_end"></i>-->
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div id="tab-2">
                            <div class="content">
                                <div class="items-container ng-scope ui-infinite" ui-infinite="" data-source="postsSource" ng-if="postsSource" ng-hide="!postsSource.pending &amp;&amp; !posts.length &amp;&amp; !recommendPosts.length">

                                    <ul class="items" id="article_items" ng-show="posts.length">
                                        @foreach($hot_articles as $article)
                                            <li class="item ng-isolate-scope
                                                @if($article["face"]!="default" and $article["face"]!="123")
                                                    item-with-title-img
                                                @else
                                                    item-with-title-img
                                                @endif
                                                    " ng-class="itemClass" ng-repeat="post in posts track by $index" post="post" column="column">
                                                <article class="hentry">
                                                    <a href="<?php echo env('APP_URL');?>/article?id={{$article["id"]}}" class="entry-link">
                                                        <h1 class="entry-title ng-binding">{{$article["title"]}}</h1>
                                                        <div class="title-img-container ng-scope" ng-if="titleImageShow">
                                                            <div class="title-img-preview" ng-style="{&#39;background-image&#39;: &#39;url(&#39; + {{$article["title"]}} + &#39;)&#39;}" style="background-image: url(&quot;{{$article["face"]}}&quot;);"></div>
                                                        </div>
                                                        <div class="entry-meta" style="margin-bottom: 5px;">
                                                            <i class="icon-x" style=""></i>
                                                            @if(isset($article["author"]["username"]))
                                                                <a href="<?php echo env('APP_URL');?>/article/list?id={{$article["author"]["id"]}}" class="vote-num ng-binding" ng-show="post.likesCount" style="color:#21B890;">

                                                                    <span>{{$article["author"]["username"]}}</span></a>
                                                            @endif
                                                            <span ng-show="post.likesCount &amp;&amp; post.commentsCount" class="bull">·</span>
                                                            <time ng-class="{short: timeStyle == &#39;short&#39;}" ui-hover-title="2016 年 11 月 12 日星期六晚上 11 点 54 分" ui-time="" datetime="2016-11-12T23:54:39+08:00" class="published ng-binding ng-isolate-scope hover-title">{{$article["publish_time"]}}</time>
                                                            <div class="entry-func ng-scope" style="float:right; display:inline;position: relative;">

                                                            <!--<i class="icon-thumbs-up"></i>

                                                                <a href="#" class="vote-num ng-binding" ng-show="post.likesCount">{{$article["likes"]}}
                                                                    <span></span></a>-->
                                                                <i class="icon-fire"></i>


                                                                <a href="#comments" style="display: inline-block;" class="comment ng-binding" ng-show="post.commentsCount">{{$article["hot_num"]}}
                                                                    <span></span></a>
                                                            </div>

                                                        </div>


                                                        <section class="entry-summary">
                                                            <p ui-summary="post.content" max="truncateMax" class="ng-isolate-scope"> {{strip_tags($article["content"])}}…

                                                            </p>
                                                        </section>
                                                        <section class="entry-summary">
                                                            <div class="tag_index">
                                                                <i class="icon-tags" ></i>
                                                                @if(isset($article["tagList"]))
                                                                    @foreach($article["tagList"] as $tag)
                                                                        <a class="" style="display: inline-block;position: relative;margin-top: 5px;" href="article/list?type=tag&id={{$tag["id"]}}">{{$tag["name"]}}</a>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </section>

                                                    </a>

                                                </article>
                                            </li>

                                        @endforeach

                                    </ul>
                                    <div class="posts-end" ng-show="posts.length &amp;&amp; postsSource.completed">
                                        <!-- <i class="icon-ic_column_end"></i>-->
                                    </div>
                                </div>


                            </div>                        </div>
                        <div id="tab-3">
                            @if(null!=session("username"))
                                <div class="content">
                                    <div class="items-container ng-scope ui-infinite" ui-infinite="" data-source="postsSource" ng-if="postsSource" ng-hide="!postsSource.pending &amp;&amp; !posts.length &amp;&amp; !recommendPosts.length">

                                        <ul class="items" id="article_items" ng-show="posts.length">
                                            @foreach($recom_articles as $article)
                                                <li class="item ng-isolate-scope
                                                @if($article["face"]!="default" and $article["face"]!="123")
                                                        item-with-title-img
                                                    @else
                                                        item-with-title-img
                                                    @endif
                                                        " ng-class="itemClass" ng-repeat="post in posts track by $index" post="post" column="column">
                                                    <article class="hentry">
                                                        <a href="<?php echo env('APP_URL');?>/article?id={{$article["id"]}}" class="entry-link">
                                                            <h1 class="entry-title ng-binding">{{$article["title"]}}</h1>
                                                            <div class="title-img-container ng-scope" ng-if="titleImageShow">
                                                                <div class="title-img-preview" ng-style="{&#39;background-image&#39;: &#39;url(&#39; + {{$article["title"]}} + &#39;)&#39;}" style="background-image: url(&quot;{{$article["face"]}}&quot;);"></div>
                                                            </div>
                                                            <div class="entry-meta" style="margin-bottom: 5px;">
                                                                <i class="icon-x" style=""></i>
                                                                @if(isset($article["author"]["username"]))
                                                                    <a href="<?php echo env('APP_URL');?>/article/list?id={{$article["author"]["id"]}}" class="vote-num ng-binding" ng-show="post.likesCount" style="color:#21B890;">

                                                                        <span>{{$article["author"]["username"]}}</span></a>
                                                                @endif
                                                                <span ng-show="post.likesCount &amp;&amp; post.commentsCount" class="bull">·</span>
                                                                <time ng-class="{short: timeStyle == &#39;short&#39;}" ui-hover-title="2016 年 11 月 12 日星期六晚上 11 点 54 分" ui-time="" datetime="2016-11-12T23:54:39+08:00" class="published ng-binding ng-isolate-scope hover-title">{{$article["publish_time"]}}</time>
                                                                <div class="entry-func ng-scope" style="float:right; display:inline;position: relative;">

                                                                <!--<i class="icon-thumbs-up"></i>

                                                                <a href="#" class="vote-num ng-binding" ng-show="post.likesCount">{{$article["likes"]}}
                                                                        <span></span></a>-->
                                                                    <i class="icon-fire"></i>


                                                                    <a href="#comments" style="display: inline-block;" class="comment ng-binding" ng-show="post.commentsCount">{{$article["hot_num"]}}
                                                                        <span></span></a>
                                                                </div>

                                                            </div>


                                                            <section class="entry-summary">
                                                                <p ui-summary="post.content" max="truncateMax" class="ng-isolate-scope"> {{strip_tags($article["content"])}}…

                                                                </p>
                                                            </section>
                                                            <section class="entry-summary">
                                                                <div class="tag_index">
                                                                    <i class="icon-tags" ></i>
                                                                    @if(isset($article["tagList"]))
                                                                        @foreach($article["tagList"] as $tag)
                                                                            <a class="" style="display: inline-block;position: relative;margin-top: 5px;" href="article/list?type=tag&id={{$tag["id"]}}">{{$tag["name"]}}</a>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </section>

                                                        </a>

                                                    </article>
                                                </li>

                                            @endforeach

                                        </ul>
                                        <div class="posts-end" ng-show="posts.length &amp;&amp; postsSource.completed">
                                            <!-- <i class="icon-ic_column_end"></i>-->
                                        </div>
                                    </div>

                                </div>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
               <div class="col-4-12 mobile-col-1-1 hide-on-mobile">
                    <div class="content">
                        <div class="mod-tit"><span><h3>热门话题</h3></span></div>

                        <div class="column-about" ng-switch="columnType == 'user'" >
                            <div class="tags ng-scope" style="margin-top:12px;">
                               <span ng-if="isShowMoreTopics" class="main_page ng-scope">
                                    @foreach($index_tags as $tag)
                                    <a class="tag ng-binding ng-scope" href="article/list?type=tag&id={{$tag["id"]}}">{{$tag["name"]}}</a>
                                        @endforeach
                                </span>
                           </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="mod-tit"><span><h3>7&times;24h 快讯</h3></span></div>
                        <div class="real_time_intelligence pad_inner">
                            <!--<h3><span>7&times;24h 快讯</span></h3>-->
                            <ul>
                                @foreach($fast_news as $article)
                                <li class="real_time_wrapper"><span class="triangle"></span>
                                    <div class="con">
                                        <h4>
                                            <!-- react-text: 715 -->
                                            <!-- /react-text --><span class="title kuaixun" data-stat-click="kuaixunmokuai.kuaixunbiaoti.1.38303">{{$article["title"]}}</span></h4>
                                        <div class="item0 hide show-content">
                                            {!! $article["content"]!!}
                                        </div>
                                        <div>
                                            <span class="time" title="{{$article["publish_time"]}}">{{$article["publish_time"]}}</span>
                                            <!--<span class="share">
                                                <div class="fast-section-share-box hide-phone">
                                                 <span class="share-title">分享至&nbsp;&nbsp; </span>
                                                 <a class="item-weixin hide-phone"><span class="icon-weixin"></span>
                                                  <div class="panel-weixin">
                                                   <section class="weixin-section">
                                                    <p></p>
                                                   </section>
                                                   <h3>打开微信“扫一扫”，打开网页后点击屏幕右上角分享按钮</h3>
                                                  </div></a>
                                                 <a href="http://share.baidu.com/s?type=text&amp;searchPic=1&amp;sign=on&amp;to=tsina&amp;key=595885820&amp;url=http://36kr.com/newsflashes/38303&amp;title=%E4%BB%8A%E6%97%A5%EF%BC%8C%E7%A7%91%E6%8A%80%E7%BE%8E%E5%AD%A6%E5%88%9B%E6%96%B0%E4%BA%A7%E5%93%81%E5%AD%B5%E5%8C%96%E5%88%86%E5%8F%91%E5%B9%B3%E5%8F%B0%E5%A4%AA%E7%81%AB%E9%B8%9F%E7%A7%91%E6%8A%80%E5%AE%A3%E5%B8%83%E8%8E%B7%E5%BE%971000%E4%B8%87%E7%BE%8E%E9%87%91%E7%BA%A7%E5%88%AB%E7%9A%84Pre-B%E8%BD%AE%E8%9E%8D%E8%B5%84%EF%BC%8C%E6%9C%AC%E8%BD%AE%E6%8A%95%E8%B5%84%E7%94%B1%E7%BD%97%E8%8E%B1%E7%94%9F%E6%B4%BB%E9%A2%86%E6%8A%95%EF%BC%8C%E6%B5%B7%E6%B3%89%E5%9F%BA%E9%87%91%E3%80%81%E4%BA%AC%E4%B8%9C%E9%87%91%E8%9E%8D%E3%80%81%E9%BA%A6%E9%A1%BF%E8%B5%84%E6%9C%AC%E5%92%8C%E6%B3%B0%E5%BE%B7%E8%B5%84%E6%9C%AC%E5%8F%82%E4%B8%8E%E3%80%82%E5%A4%AA%E7%81%AB%E9%B8%9F%E8%BF%98%E4%B8%8E%E4%B8%8A%E8%BF%B0%E6%8A%95%E8%B5%84%E6%96%B9%E4%BB%A5%E5%8F%8A%E5%88%9B%E6%96%B0%E5%B7%A5%E5%9C%BA%E3%80%81%E7%9C%9F%E6%A0%BC%E5%9F%BA%E9%87%91%E3%80%81%E5%B0%8F%E7%B1%B3%E7%94%9F%E6%80%81%E9%93%BE%E7%AD%89%E6%88%98%E7%95%A5%E5%90%88%E4%BD%9C%E6%96%B9%E5%85%B1%E5%90%8C%E5%8F%91%E8%B5%B7%E2%80%9C%E6%99%BA%E8%A7%81%E6%9C%AA%E6%9D%A5-%E5%A4%AA%E7%81%AB%E9%B8%9FAesTech%E8%81%94%E5%90%88%E5%8A%A0%E9%80%9F%E8%AE%A1%E5%88%92%E2%80%9D%E3%80%82" target="_blank"><span class="icon-sina"></span></a>
                                                </div>
                                            </span>-->
                                        </div>
                                    </div>
                                </li>
                                    @endforeach
                            </ul>
                            <!--<a class="more-fastsection" href="/newsflashes" target="_blank" data-stat-click="kuaixunmokuai.gengduo">
                                浏览更多
                                <span class="icon-arrow-right"></span></a>-->
                        </div>
                    </div>
                </div>
            </div>
    <!--        <section class="l-receptacle">
                <h3>
                    <span>标签 · 发现</span>
                </h3>
                <ul class="column-card-list clearfix">
                    @foreach($index_tags as $tag)
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
            <div class="bottom hide-on-mobile">
                <h3>在贝塔区块链创作</h3>
                <p class="copyright">
                    <!--<a ui-open-blank="" href="" class="about">关于专栏</a>-->
                    <span>©️2016 贝塔区块链</span></p>
            </div>
        </div>
    </main>
@stop
@section("page_level_js")
    <script src="responsive-tabs_/js/jquery.responsiveTabs.js"></script>
    <script>
        $(document).ready(function(){
            $("#the_newest").click();

            $("#the_sugg").click(function() {
                    window.location.href = "/suggestion_tag";
                }
            );
        });
    </script>
    <script>
        $('#responsiveTabsDemo').responsiveTabs({
            startCollapsed: 'accordion'
        });
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
                                "<i class=\"icon-chevron-right-outline\"></i></span></p></section></a><footer>"+
                                "<div class=\"entry-meta\"><time class=\"published ng-binding ng-isolate-scope hover-title\">"+article["publish_time"]+"</time></div>"+
                                "<div class=\"entry-func ng-scope\"><i class=\"icon-thumbs-up\"></i>"+
                                "<a href=\"#\" class=\"vote-num ng-binding\">"+article["likes"]+
                                "<span></span></a>"+
                                "<span class=\"bull\">·</span>"+
                                "<i class=\"icon-message\"></i><a href=\"#\" class=\"comment ng-binding\" ng-show=\"post.commentsCount\">"+article["comment_num"]+
                                "<span></span></a>"+
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
            }
        });
    </script>
    <script>
        $(".kuaixun").click(function(){
            var the_li = $(this).closest('li');
            if (the_li.hasClass("show"))
            {
                the_li.removeClass("show")
                the_li.children('div.con').children(".item0").css("display","none");
            }
            else {
                the_li.addClass("show");
                the_li.children('div.con').children(".item0").css("display", "block");
            }
            //this.clo();
            //console.log(this.parent());
        });
    </script>
    @stop