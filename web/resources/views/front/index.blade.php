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
        <li class="column-card-item ng-scope" ng-repeat="column in recommendColumns track by column.slug">
            <p class="avatar">
                <a href="article/list?id={{$tag["id"]}}" ui-open-blank="" ng-click="handleRecommendColumnClick()">
                                    <img alt="" ng-src="https://pic4.zhimg.com/66aab91d7_l.jpg" src="{{$tag["face"]}}"></a>
                            </p>
                            <p class="title">
                                <a ui-open-blank="" ng-click="handleRecommendColumnClick()" href="article/list?type=tag&id={{$tag["id"]}}" class="ng-binding">{{$tag["name"]}}</a></p>
                            <p class="description">
                                <a ui-open-blank="" ng-click="handleRecommendColumnClick()" href="article/list?type=tag&id={{$tag["id"]}}" class="ng-binding">{{$tag["brief"]}}</a></p>
                            <p class="meta ng-binding">-1 人关注
                                <span class="split">|</span>-1 篇文章</p>
                            <a ui-open-blank="" ng-click="handleRecommendColumnClick()" class="btn btn-green btn-90_32" href="article/list?type=tag&id={{$tag["id"]}}">进入页面</a>
                        </li>
                            @endforeach
            </ul>
            <p class="random">
                <a class="btn btn-black btn-90_32" href="javascript:;" ng-click="nextRecommendColumn($event)">
                    <i class="icon-ic_refresh"></i>换一换</a>
            </p>
        </section>
                <section class="l-receptacle">
                    <h3>
                        <span>作者 · 发现</span>
                    </h3>
                    <ul class="column-card-list clearfix">
                        @foreach($users as $user)
                            <li class="column-card-item ng-scope" ng-repeat="column in recommendColumns track by column.slug">
                                <p class="avatar">
                                    <a href="article/list?id={{$user["id"]}}" ui-open-blank="" ng-click="handleRecommendColumnClick()">
                                        <img alt="" ng-src="https://pic4.zhimg.com/66aab91d7_l.jpg" src="{{$user["avatar"]}}"></a>
                                </p>
                                <p class="title">
                                    <a ui-open-blank="" ng-click="handleRecommendColumnClick()" href="article/list?id={{$user["id"]}}" class="ng-binding">{{$user["username"]}}</a></p>
                                <p class="description">
                                    <a ui-open-blank="" ng-click="handleRecommendColumnClick()" href="article/list?id={{$user["id"]}}" class="ng-binding">{{$user["brief"]}}</a></p>
                                <p class="meta ng-binding">-1 人关注
                                    <span class="split">|</span>-1 篇文章</p>
                                <a ui-open-blank="" ng-click="handleRecommendColumnClick()" class="btn btn-green btn-90_32" href="article/list?id={{$user["id"]}}">进入页面</a>
                            </li>
                        @endforeach
                    </ul>
                    <p class="random">
                        <a class="btn btn-black btn-90_32" href="javascript:;" ng-click="nextRecommendColumn($event)">
                            <i class="icon-ic_refresh"></i>换一换</a>
                    </p>
                </section>
        <section class="l-receptacle">
            <h3>
                <span>文章 · 发现</span></h3>
            <ul class="post-card-list clearfix">
            @foreach($articles as $article)
            <li class="post-card-item ng-scope" ng-repeat="post in recommendPosts track by post.slug">
                <a ui-open-blank="" href="article?id={{$article["id"]}}">

                        <p class="post-img ng-scope" ng-if="post.titleImage" ng-style="{&#39;background-image&#39;: &#39;url(&#39;+ (post.titleImage | imgSize: &#39;b&#39;) +&#39;)&#39;}" style="background-image: url(&quot;{{$article["face"]}}&quot;);"></p>

                        <p class="title ng-binding">{{$article["title"]}}</p>
                        <p ng-show="!post.titleImage &amp;&amp; winType != &#39;small&#39;" class="content ng-binding ng-hide">{{$article["abstracts"]}}…
                            <span class="read-all">查看全文
                            <i class="icon-ic_unfold"></i></span>
                        </p>
                    </a>
                    <p class="meta">
                    <span class="author ellipsis">
                    <a target="_blank" href="article/list?id={{$article["author"]["id"]}}" class="ng-binding">{{$article["author"]["username"]}}</a>
                    </span><span ng-if="post.column" class="source ellipsis ng-scope">发表于
                    <a ui-open-blank="" href="https://zhuanlan.zhihu.com/hemingke" class="ng-binding">xxx</a>
                        </span>
                    </p>
                </li>
                @endforeach
            </ul>
            <p class="random">
                <a class="btn btn-black btn-90_32" href="javascript:;" ng-click="nextRecommendPost($event)">
                    <i class="icon-ic_refresh"></i>换一换</a>
            </p>
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