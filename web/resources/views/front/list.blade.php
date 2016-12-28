@extends("front/master")
    @section("content")
        <main class="main-container ng-scope" ng-view="">
            <div class="main receptacle ng-scope">
                <div class="column-about" ng-switch="columnType == &#39;user&#39;">
                    <div class="avatar-link">
                        <img class="avatar-big" src="{{$user["avatar"] or $tag["face"]}}"></div>
                    <div href="#" class="title ng-binding">{{$user["username"] or $tag["name"]}}</div>
                    <div class="description ng-binding" ng-bind-html="column.intro | linky">{{$user["brief"] or $tag["brief"]}}…</div>

                    <div class="functions ng-scope" ng-switch-when="false" ng-hide="column.activateState != &#39;activated&#39;">

                        <!--<button ui-follow-button="" ng-model="column.following" ng-click="toggleFollow()" class="btn btn-90_36 ng-scope ng-isolate-scope ng-pristine ng-valid btn-green" ng-if="!column.canManage">关注</button>-->
                       @if(isset($is_follower) and $is_follower===false)
                        @if(isset($tag))
                            <a class="btn btn-90_36 ng-scope ng-isolate-scope ng-pristine ng-valid btn-green" href="<?php echo env('APP_URL');?>/tag/subscribe?id={{$tag["id"]}}">订阅</a>
                        @elseif(isset($user))
                            <a class="btn btn-90_36 ng-scope ng-isolate-scope ng-pristine ng-valid btn-green" href="<?php echo env('APP_URL');?>/user/follow?id={{$user["id"]}}">关注</a>
                            @endif
                        @else
                            @if(isset($tag))
                                <a class="btn btn-90_36 ng-scope ng-isolate-scope ng-pristine ng-valid btn-red" href="<?php echo env('APP_URL');?>/tag/unsubscribe?id={{$tag["id"]}}">取消订阅</a>
                            @elseif(isset($user))
                                <a class="btn btn-90_36 ng-scope ng-isolate-scope ng-pristine ng-valid btn-red" href="<?php echo env('APP_URL');?>/user/unfollow?id={{$user["id"]}}">取消关注</a>
                            @endif
                        @endif

                    <!--<div ng-transclude="" class="more-funcs menu-button-no-arrow ui-menu-button ng-scope" ng-class="{ true: &#39;open&#39;, false: &#39;close&#39; }[open]" ui-menu-button="">
                        <span class="menu-button ng-scope">
                          <i class="icon-ic_unfold"></i>
                        </span>
                            <menu class="menu navbar-menu ng-scope">
                                <a href="https://zhuanlan.zhihu.com/girlslovebreakfast/about" class="menu-item" tabindex="0">关于</a>

                                <a ng-if="column.acceptSubmission" href="javascript:;" class="menu-item ng-scope" ng-click="handleContribute()" tabindex="0">投稿到该专栏</a>

                             </menu>
                        </div>-->
                    </div>

                    <div class="followers ng-scope" ng-switch-when="false" ng-hide="column.activateState != &#39;activated&#39;">
                        <a ui-open-blank="" ng-if="column.followersCount" class="ng-binding ng-scope" href="
                    @if(isset($user))
                        <?php echo env('APP_URL');?>/user/follower?id={{$user["id"]}}
                                @elseif(isset($tag))
                        <?php echo env('APP_URL');?>/tag/subscribers?id={{$tag["id"]}}
                                @endif
">{{$user["followers_count"] or $tag["subscriberCount"]}} 人关注</a>
                    </div>
                    <!--
                    <div class="tags ng-scope" ng-if="!currentAuthor &amp;&amp; column.postTopics.length">
                        <span ng-click="filterTopic()" class="tag ng-binding current" ng-class="!currentTopic &amp;&amp; &#39;current&#39;">
                        <b>全部</b>43
                        </span>
                        <span ng-if="!isShowMoreTopics" class="ng-scope">
                            <span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; &#39;current&#39;" ng-repeat="topic in column.postTopics | limitTo: 3">
                              <b class="ng-binding">早餐</b>3</span>

                            <span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; &#39;current&#39;" ng-repeat="topic in column.postTopics | limitTo: 3">
                              <b class="ng-binding">生活方式</b>1</span>

                            <span ng-click="filterTopic(topic)" class="tag ng-binding ng-scope" ng-class="currentTopic == topic &amp;&amp; &#39;current&#39;" ng-repeat="topic in column.postTopics | limitTo: 3">
                              <b class="ng-binding">菜谱</b>1</span>
                            <span ng-click="showMoreTopics()" ng-if="column.postTopics.length &gt; showTopicNum" class="more ng-scope">更多</span>
                        </span>
                    </div>-->
                    </div>

                <div class="list-empty ng-hide" ng-show="!postsSource.pending &amp;&amp; !posts.length &amp;&amp; !recommendPosts.length">
                    <div class="posts-end">
                        <i class="icon-ic_column_end"></i>
                    </div>
                    <i class="icon-show icon-ic_column_no_article"></i>
                    <p class="ng-binding">服务器提了一个问题，请稍候再试。</p>
                </div>
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
            <div class="modal-dialog-bg" style="display: none; opacity: 0.5;"></div>
            <div class="modal-dialog transfer-dialog ng-scope " ui-dialog="" open="ownColumn() &amp;&amp; column.activateState == &#39;frozen&#39;" aria-labelledby=":0" role="dialog" style="display: none;">
                <div class="modal-dialog-title modal-dialog-title-draggable" id=":0">
                    <span class="modal-dialog-title-text"></span>
                    <span class="modal-dialog-title-close"></span>
                </div>
                <!-- ngInclude: -->
                <div class="modal-dialog-content ng-scope" ng-include="" src="&#39;/views/column-transfer.html&#39;">
                    <div ng-controller="ColumnTransferCtrl" ng-class="{&#39;show-next&#39;: showCancelColumn || showCompleteForm}" class="transfer-dialog-inner ng-scope">
                        <div class="intro">
                            <div class="text">
                                <h6>欢迎来到新版专栏</h6></div>
                        </div>
                        <div class="column-form complete-form fx-item-enter ng-pristine ng-valid" ng-form="requestForm">
                            <p class="description">请确认或补全
                                <b class="ng-binding">姑娘们的美好早餐</b>的专栏信息，开始使用新版专栏</p>
                            <div class="setting-sec item-form-label-top column-topic">
                                <div class="form-title block-title-wider block-title-no-underline block-title ng-scope" ng-class="scope.help &amp;&amp; block-title-help" data-help="专栏话题即你计划的写作方向，申请通过后，专栏话题将不可修改。不同的写作方向可以分别申请多个专栏。">
                <span ng-transclude="">
                  <span class="ng-scope">专栏话题</span></span>
                                    <!-- ngIf: help -->
                                    <div ng-transclude="" class="help ui-menu-button ng-scope" ng-class="{ true: &#39;open&#39;, false: &#39;close&#39; }[open]" ng-if="help" ui-menu-button="">
                  <span class="menu-button ng-scope">
                    <i class="icon-ic_help"></i>
                  </span>
                                        <menu class="menu ng-scope">
                                            <div class="item ng-binding">专栏话题即你计划的写作方向，申请通过后，专栏话题将不可修改。不同的写作方向可以分别申请多个专栏。</div></menu>
                                    </div>
                                    <!-- end ngIf: help --></div>
                                <div class="tag-suggestion-container ng-isolate-scope ng-pristine ng-valid ng-valid-min-tags ng-valid-max-tags" ui-tag-input="" holdertext="搜索话题" max-tags="3" suggest-options="suggestOptions" ng-model="column.topics">
                                    <ul class="tags">
                                        <!-- ngRepeat: tag in tags -->
                                        <li ng-repeat="tag in tags" class="ng-scope">
                    <span class="inner-wrapper">
                      <a class="tag-link ng-binding" href="javascript:;" target="_blank" ng-bind-html="tag.name">美食</a>
                      <a class="remove-tag" href="javascript:;" ng-click="removeTag(tag)" title="移除">
                        <i class="icon-ic_close"></i>
                      </a>
                    </span>
                                        </li>
                                        <!-- end ngRepeat: tag in tags -->
                                        <li ng-repeat="tag in tags" class="ng-scope">
                    <span class="inner-wrapper">
                      <a class="tag-link ng-binding" href="javascript:;" target="_blank" ng-bind-html="tag.name">生活</a>
                      <a class="remove-tag" href="javascript:;" ng-click="removeTag(tag)" title="移除">
                        <i class="icon-ic_close"></i>
                      </a>
                    </span>
                                        </li>
                                        <!-- end ngRepeat: tag in tags -->
                                        <li ng-repeat="tag in tags" class="ng-scope">
                    <span class="inner-wrapper">
                      <a class="tag-link ng-binding" href="javascript:;" target="_blank" ng-bind-html="tag.name">早餐</a>
                      <a class="remove-tag" href="javascript:;" ng-click="removeTag(tag)" title="移除">
                        <i class="icon-ic_close"></i>
                      </a>
                    </span>
                                        </li>
                                        <!-- end ngRepeat: tag in tags --></ul>
                                    <div class="input-container disabled" ng-class="{&#39;mui-container-search&#39;: tags.length &lt; options.maxTags, &#39;disabled&#39;: tags.length &gt;= options.maxTags}">
                                        <input ui-suggest="" suggest-options="suggestOptions" class="mui-input ng-isolate-scope" ng-disabled="tags.length &gt;= options.maxTags" placeholder="搜索话题" aria-haspopup="true" autocomplete="off" disabled="disabled"></div>
                                </div>
                                <div class="tips-always ng-hide" ng-show="showTopicTips">
                                    <div class="left">修改通过后 30 天内无法更改</div></div>
                            </div>
                            <div class="submit-buttons">
                                <a class="rule" href="https://zhuanlan.zhihu.com/p/20635074" target="_blank">
                                    <i class="icon-ic_help"></i>了解新版专栏</a>
                                <button class="btn btn-blue" ng-disabled="requestForm.$invalid || submiting" ng-click="requestForm.$valid &amp;&amp; !submiting &amp;&amp; submit()">开启新专栏</button></div>
                        </div>
                    </div>
                </div>
                <div class="modal-dialog-buttons"></div>
                <div class="modal-dialog-content"></div>
            </div>
            <span tabindex="0" style="display: none; position: absolute;"></span>
            <div class="modal-dialog-bg" style="display: none; opacity: 0.5;"></div>
            <div class="modal-dialog welcome-dialog ng-scope " ui-dialog="" open="ownColumn() &amp;&amp; column.firstTime" aria-labelledby=":1" role="dialog" style="display: none;">
                <div class="modal-dialog-title modal-dialog-title-draggable" id=":1">
                    <span class="modal-dialog-title-text"></span>
                    <span class="modal-dialog-title-close"></span>
                </div>
                <div class="modal-dialog-content">
                    <h6>欢迎，你的专栏已创建</h6>
                    <div class="description">接下来，你可以前往「管理专栏」页面设置你的专栏品牌，或者邀请志同道合的朋友一起来写作。当然，你也可以现在就开始写文章。：）</div>
                    <a href="https://zhuanlan.zhihu.com/girlslovebreakfast/settings" class="btn btn-blue go-setting" ng-click="arrived()">前往专栏设置 »</a>
                    <button class="btn btn-grey-link skip" ng-click="arrived()">跳过</button></div>
                <div class="modal-dialog-buttons"></div>
            </div>
            <span tabindex="0" style="display: none; position: absolute;"></span>
        </main>

    @stop