@extends("front.master")
@section("content")
     <main class="main-container ng-scope" ng-view="">
            <div ng-show="recommendColumnsInited &amp;&amp; recommendPostsInited" class="ng-scope">
                <div class="top">
                    <h1>链媒体
                        <span class="bull">·</span>专栏</h1>
                    <h2>随心写作，自由表达</h2>
                    <a href="<?php echo env('APP_URL');?>/article/edit" class="btn btn-black write-btn">开始写文章</a></div>

                <div class="grid grid-pad">
                    <div class="col-8-12 mobile-col-1-1">
                        <div class="content">
                            <div class="items-container ng-scope ui-infinite" ui-infinite="" data-source="postsSource" ng-if="postsSource" ng-hide="!postsSource.pending &amp;&amp; !posts.length &amp;&amp; !recommendPosts.length">

                                <div class="block-title ng-scope" ng-class="scope.help &amp;&amp; block-title-help" ng-show="posts.length" ng-if="!currentAuthor">
          <span ng-transclude="">
            <span class="ng-binding ng-scope">最新文章</span></span>
                                </div>
                                <ul class="items" ng-show="posts.length">
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

                            <div class="column-about" ng-switch="columnType == 'user'">
                                <div class="tags ng-scope" ng-if="!currentAuthor &amp;&amp; column.postTopics.length">
                                    <span ng-click="filterTopic()" class="tag ng-binding current" ng-class="!currentTopic &amp;&amp; 'current'"><b>全部</b>219</span>
                                    <span ng-if="isShowMoreTopics" class="ng-scope">
                                    <span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">App Store</b>4</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">手机游戏</b>4</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">游戏策划</b>4</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">游戏产业</b>3</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">游戏公司</b>3</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">招聘</b>2</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">游戏美术设计</b>2</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">猎头</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">腾讯</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">游戏运营</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">审批</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">记者</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">资本</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">虚拟现实（VR）</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">我的世界（Minecraft）</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">投资</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">腾讯游戏</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">DAU</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">游戏厂商</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">卡牌</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">MAU</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">App Annie</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">移动游戏</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">Supercell</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">工资待遇</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">手游运营</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">任天堂 (Nintendo)</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">精灵宝可梦（Pokémon）</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">手游开发</b>1</span><!-- end ngRepeat: topic in column.postTopics --><span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; 'current'" ng-repeat="topic in column.postTopics"><b class="ng-binding">代办申请</b>1</span></span>
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
                <div class="bottom">
                    <h3>在链媒体创作</h3>
                    <p class="copyright">
                        <a ui-open-blank="" href="" class="about">关于专栏</a>
                        <span>©️2016 链媒体</span></p>
                </div>
            </div>
     </main>
    @stop