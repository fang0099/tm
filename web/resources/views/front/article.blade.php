@extends("front/master")
    @section("page_level_css")
        <link media="all" rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/styles/font-awesome.css" />
        <link media="all" rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/styles/simditor.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/styles/simditor-fullscreen.css" />
        <style>
            #submit
            {
                float:right;
            }
        </style>
    @stop
    @section("content")
        <main class="main-container ng-scope" ng-view="">
            <div class="main receptacle post-view ng-scope" ng-class="post.isTitleImageFullScreen &amp;&amp; winType != &#39;small&#39; &amp;&amp; !isCensoring &amp;&amp; &#39;full-screen-cover&#39;" ng-if="!notFound" data-za-module="PostItem">
                <article class="entry" ui-lightbox="">
                    <header>
                        <div class="entry-title-image ng-scope" ng-if="post.titleImage &amp;&amp; !isCensoring" ng-switch="!!(post.titleImageSize.width || (winType != &#39;small&#39; &amp;&amp; post.isTitleImageFullScreen))">
                            <img ng-switch-when="false" ng-src="" class="ng-scope" src="{{$article["face"]}}"></div>

                        <div class="placeholder"></div>
                        <h1 class="multiline2 entry-title">{{ $article["title"] }}</h1>
                        <div class="entry-meta">
                            <a target="_blank" href="article/list?id={{$article["author"]["id"]}}" class="author name ng-binding">
                                <img ng-src="https://pic4.zhimg.com/f5daea5bec82e658f5995568e35e397f_m.jpg" alt="" class="avatar-small" src="{{$article["author"]["avatar"]}}">{{$article["author"]["username"]}}</a>
                            <ui-badge is-org="post.author.isOrg" badge="post.author.badge" size="14" class="ng-isolate-scope">
                                <span ng-if="badge" class="ng-scope"></span>
                                <!-- end ngIf: badge --></ui-badge>
                            <span class="bull">·</span>
                            <time ng-class="{short: timeStyle == &#39;short&#39;}" ui-hover-title="" ui-time="" datetime="2016-11-28T15:04:43+08:00" class="published ng-binding ng-isolate-scope hover-title">{{$article["publish_time"]}}</time></div>
                    </header>
                    <section class="entry-content ng-binding ng-scope" ng-bind-html="postContentTrustedHtml" ui-copyright-check="" data-entry-url="/p/24002150" data-author-name="小研" ng-if="ownPost(post) || !isCensoring">
                        {!! $article["content"] !!}
                    </section>
                    <footer>
                        <!-- ngIf: !forceHideTipjar && !isCensoring && (post.tipjarState==' activated' || (ownPost(post) && post.tipjarState !=' closed' && !me.isOrg)) -->
                        <div class="tipjar-container" ng-class="{&#39;owner-tipjar-container&#39;: ownPost(post)}" ng-switch="post.tipjarState == &#39;activated&#39;" id="tipjar" ng-if="!forceHideTipjar &amp;&amp; !isCensoring &amp;&amp; (post.tipjarState == &#39;activated&#39; || (ownPost(post) &amp;&amp; post.tipjarState != &#39;closed&#39; &amp;&amp; !me.isOrg))">

                            <div class="entry-exinfo clearfix ng-scope" ng-if="isPublished">
                                <p class="tags ng-scope full-screen" ng-if="post.topics.length" ng-class="{&#39;full-screen&#39;: !post.reviewers.length}">
                                    <!-- ngRepeat: topic in post.topics | limitTo:3 -->
                                    <span class="tag ng-binding ng-scope" ng-repeat="topic in post.topics | limitTo:3">文曲星</span>
                                    <!-- end ngRepeat: topic in post.topics | limitTo:3 -->
                                    <span class="tag ng-binding ng-scope" ng-repeat="topic in post.topics | limitTo:3">小霸王游戏机</span>
                                    <!-- end ngRepeat: topic in post.topics | limitTo:3 -->
                                    <span class="tag ng-binding ng-scope" ng-repeat="topic in post.topics | limitTo:3">中央处理器 (CPU)</span>
                                    <!-- end ngRepeat: topic in post.topics | limitTo:3 --></p>
                                <!-- end ngIf: post.topics.length --></div>
                            <!-- end ngIf: isPublished -->
                            <div class="entry-controls clearfix">
                                <div class="right-section">
                                    <!-- ngIf: isPublished && !supportTouch -->
                                    <div ng-transclude="" class="post-share-button post-menu-button menu-button-no-arrow ui-menu-button ng-scope" ng-class="{ true: &#39;open&#39;, false: &#39;close&#39; }[open]" ui-menu-button="" onbeforeopen="beforeShareMenuOpen()" ng-if="isPublished &amp;&amp; !supportTouch">
                                        <a href="javascript:;" class="menu-button control-item share ng-scope">
                                            <i class="icon-ic_column_share"></i>分享</a>
                                        <menu class="menu ng-scope">
                                            <!-- ngRepeat: item in shareMenuItems -->
                                            <button ng-click="item.action($event)" class="menu-item ng-binding ng-scope menu-item-sina" ng-repeat="item in shareMenuItems" ng-class="item.className" tabindex="0">
                                                <i class="icon icon-ic_share_sina"></i>新浪微博
                                                <!-- ngIf: item.html --></button>
                                            <!-- end ngRepeat: item in shareMenuItems -->
                                            <button ng-click="item.action($event)" class="menu-item ng-binding ng-scope menu-item-wechat" ng-repeat="item in shareMenuItems" ng-class="item.className" tabindex="0">
                                                <i class="icon icon-ic_share_wechat"></i>微信扫一扫
                                                <!-- ngIf: item.html -->
                                                <div class="extra ng-binding ng-scope" ng-if="item.html" ng-bind-html="item.html">
                                                    <div class="ShareQRCode"></div></div>
                                                <!-- end ngIf: item.html --></button>
                                            <!-- end ngRepeat: item in shareMenuItems -->
                                            <button ng-click="item.action($event)" class="menu-item ng-binding ng-scope menu-item-dudu" ng-repeat="item in shareMenuItems" ng-class="item.className" tabindex="0">
                                                <i class="icon icon-ic_share_dudu"></i>读读日报
                                                <!-- ngIf: item.html --></button>
                                            <!-- end ngRepeat: item in shareMenuItems --></menu>
                                    </div>
                                    <a href="article/edit?id={{$article["id"]}}" class="control-item post-edit-button ng-scope" ng-if="ownPost(post)"><i class="icon-ic_column_edit"></i>编辑</a>

                                    <a ng-if="!ownPost(post) &amp;&amp; isPublished" ng-click="report(post)" href="article/collect?id={{$article["id"]}}" class="control-item report ng-scope">
                                        <i class="icon-ic_column_report"></i>收藏</a>
                                    <a ng-if="!ownPost(post) &amp;&amp; isPublished" ng-click="report(post)" href="article/delete?id={{$article["id"]}}" class="control-item report ng-scope">
                                        <i class="icon-ic_column_report"></i>删除</a>
                                    <div ng-transclude="" class="post-options-button post-menu-button menu-button-no-arrow ui-menu-button ng-scope close" ng-class="{ true: &#39;open&#39;, false: &#39;close&#39; }[open]" ui-menu-button="" ng-if="ownPost(post)" toggle-delay="250">
                                        <a href="javascript:;" class="menu-button control-item options ng-scope">
                                            <i class="icon-ic_column_more"></i><span class="hide-text">设置</span>
                                        </a>
                                        <menu class="menu ng-scope">
                                            <a href="javascript:;" ng-click="removePost()" class="menu-item" tabindex="0">删除文章</a>
                                        </menu>
                                    </div>

                                    </div>
                                <!-- ngIf: isPublished -->
                                <div class="left-section ng-scope" ng-if="isPublished">
                                    <div class="votes">

                                        <a ng-if="!ownPost(post)" ng-click="post.toggleLike()" class="control-item ng-binding ng-scope" href="article/like?id={{$article["id"]}}" ng-class="{ active: post.rating == &#39;like&#39; }">
                                            <i class="icon-ic_column_like"></i>{{$article["likes"]}}</a>

                                    </div>
                                </div>

                                <div class="entry-comments post-comments comment-box ng-isolate-scope empty" ng-show="expanded" ng-class="{ empty: !pending &amp;&amp; !comments.length }" ng-switch="pending" id="comments" ui-post-comments="" comments-placeholder="写下你的评论" comment-need-review="commentNeedReview" comments-href="post.links.comments" comments-expanded="true" comments-post-owner="post.author" comments-status="commentsStatus" ng-if="isPublished &amp;&amp; !isQQNews" comments-style="pagination" locate-comment-id="locateCommentId">
                                    <div class="box-header" ng-switch="!!(isPostOwner(me) &amp;&amp; me.isOrg)">
                                        <!-- ngSwitchWhen: false -->
                                        <div ng-switch-when="false" class="ng-scope">
                                            <div class="block-title ng-scope" ng-class="scope.help &amp;&amp; block-title-help">
        <span ng-transclude="">
          <span class="ng-binding ng-scope">评论</span>
            <!-- ngInclude: '/views/post-comments-settings.html' -->
          <span ng-include="'/views/post-comments-settings.html'" class="ng-scope">
            <!-- ngIf: isPostOwner(me) -->
            <div ng-transclude="" class="comment-setting-button menu-button-no-arrow ui-menu-button ng-scope" ng-class="{ true: 'open', false: 'close' }[open]" ui-menu-button="" ng-if="isPostOwner(me)">
              <a href="javascript:;" class="menu-button comment-setting-button ng-scope">
                <!-- ngIf: ownPost() -->
                <i class="icon-ic_column_more ng-scope" ng-if="ownPost()"></i>
                  <!-- end ngIf: ownPost() -->
                <span class="hide-text">评论设置</span></a>
              <menu class="menu ng-scope">
                <!-- ngRepeat: item in commentSettingMenuItems -->
                <label class="menu-item ng-binding ng-scope" ng-repeat="item in commentSettingMenuItems" tabindex="0">
                  <input name="comment-settting" type="radio" value="anyone" class="mui-radio ng-pristine ng-valid" ng-model="status.permission" ng-click="onClickCommentSettingItem($event)">所有人都能评论该文章</label>
                  <!-- end ngRepeat: item in commentSettingMenuItems -->
                <label class="menu-item ng-binding ng-scope" ng-repeat="item in commentSettingMenuItems" tabindex="0">
                  <input name="comment-settting" type="radio" value="friends" class="mui-radio ng-pristine ng-valid" ng-model="status.permission" ng-click="onClickCommentSettingItem($event)">只有作者关注的人才能评论该文章</label>
                  <!-- end ngRepeat: item in commentSettingMenuItems -->
                <label class="menu-item ng-binding ng-scope" ng-repeat="item in commentSettingMenuItems" tabindex="0">
                  <input name="comment-settting" type="radio" value="none" class="mui-radio ng-pristine ng-valid" ng-model="status.permission" ng-click="onClickCommentSettingItem($event)">关闭评论</label>
                  <!-- end ngRepeat: item in commentSettingMenuItems --></menu>
            </div>
              <!-- end ngIf: isPostOwner(me) --></span>
        </span>
                                                <!-- ngIf: help --></div>
                                        </div>
                                        <!-- ngSwitchWhen: true --></div>

                                    <div ng-switch-when="false" class="ng-scope">

                                        <form action="article/comment" method="post" enctype="multipart/form-data" class="comment-form comment-box-ft ng-scope ng-invalid ng-invalid-content-required ng-dirty expanded" ng-class="{ 'expanded': formExpanded }" name="commentForm" ng-if="(status.canComment || status.forceShowCommentForm) &amp;&amp; state === 'normal'">

                                            <img class="avatar avatar-small ng-scope" ng-src="https://pic1.zhimg.com/da8e974dc_l.jpg" ng-if="me.authed()" src="https://pic1.zhimg.com/da8e974dc_l.jpg">

                                            <textarea id="editor" name="comment-content"></textarea>
                                            <input name="id" value="{{$article["id"]}}" style="display: none;"/>

                                            <div class="command clearfix ng-scope" ng-if="me.authed()">
                                                <button type="submit" ng-click="addComment()" class="save btn btn-blue">评论</button>
                                                </div>
                                        </form>

                                        <div class="comment-list-container ng-scope ng-isolate-scope ui-pagination" ng-if="loadStyle == 'pagination'" url="commentHrefMap[state]" data="oriComments" extra="commentCountMap[state]" index="locateItemIndex" ui-pagination="">
                                            <ul class="comment-list">

                                            </ul>
                                            <div class="ui-spinner-container ng-scope" style="display: none;">
                                                <div class="ui-spinner use-css" ui-spinner=""></div>
                                            </div>

                                            <div class="pagination ng-scope ng-hide" ng-if="pages" ng-show="total>1">

                                                <button class="num btn btn-grey ng-binding ng-scope current btn-circle" ng-repeat="p in pages track by $index" ng-class="{current: p==current, disabled: p == '...',  'btn-circle': p==current, 'btn-circle-nborder': p!=current}" ng-click="changeTo(p, $event)" tabindex="0">1</button>
                                            </div>
                                            </div>
                                    </div>
                                </div>



                                <div class="comment-list-container ng-scope ng-isolate-scope ui-pagination" ng-if="loadStyle == 'pagination'" url="commentHrefMap[state]" data="oriComments" extra="commentCountMap[state]" index="locateItemIndex" ui-pagination="">
                                    <ul class="comment-list">
                                        @foreach($comment_list as $comment)
                                        <li class="comment-item" id="comment-215346091" ui-events="{focusin: 'focusin = true', focusout: 'focusin = false'}" ng-class="{focusin: focusin, 'comment-item-deleted': comment.deleted}" ng-switch="!!comment.deleted" ng-repeat="comment in comments track by comment.id">
                                            <div ng-switch-when="false" class="comment-item-inner-normal ng-scope">
                                                <a ui-hovercard="" target="_blank" class="avatar-link" title="lucas" href="https://www.zhihu.com/people/lucas-35-31" tabindex="-1">
                                                    <img ng-src="https://pic1.zhimg.com/da8e974dc_l.jpg" class="avatar avatar-small" src="{{$comment["avatar"]}}">
                                                </a>

                                                <div class="comment-body" ng-init="reply = {content: '', hidden: true}">


                                                    <div class="comment-hd" ng-class="{'comment-hd-conversation': comment.inReplyToCommentId}">
                                                        <a href="https://www.zhihu.com/people/lucas-35-31" target="_blank" class="ng-binding">{{$comment["username"]}}</a>
                                                        <!-- <span ng-if="comment.author.isOrg" class="OrgBadge z-ico-badge16" ui-hover-title="已认证的机构"></span> -->
                                                        <!-- ngIf: isPostOwner(comment.author) --><span ng-if="isPostOwner(comment.author)" class="ng-scope"></span><!-- end ngIf: isPostOwner(comment.author) -->
                                                        <span class="in-reply-to ng-hide" ng-show="comment.inReplyToUser">
          回复 <a href="" class="ng-binding"></a>
                                                            <!-- <span ng-if="comment.inReplyToUser.isOrg" class="OrgBadge z-ico-badge16" ui-hover-title="已认证的机构"></span> -->
                                                            <!-- ngIf: isPostOwner(comment.inReplyToUser) -->
        </span>
                                                        <!-- ngIf: comment.reviewing -->
                                                    </div>

                                                    <div class="comment-content ng-binding" ng-bind-html="comment.content">{!! $comment["content"] !!}</div>

                                                    <div class="comment-ft clearfix">
                                                        <!-- ngIf: timeStyle != 'shor' --><time ng-class="{short: timeStyle == 'short'}" ui-hover-title="2016 年 12 月 29 日星期四晚上 11 点 24 分" ng-if="timeStyle != 'shor'" ui-time="" datetime="2016-12-29T23:24:34+08:00" class="date ng-binding ng-scope ng-isolate-scope hover-title" time-style="timeStyle">{{$comment["publish_time"]}}</time><!-- end ngIf: timeStyle != 'shor' -->

                                                        <span class="like-num nil" title="0 人觉得这个很赞"><span class="ng-binding">0</span> <span>赞</span></span>

                                                        <!-- ngIf: state === 'reviewing' && comment.reviewing -->

                                                        <!-- ngIf: canRemove(comment) && state === 'normal' --><a ng-if="canRemove(comment) &amp;&amp; state === 'normal'" ng-click="remove(comment)" href="article/comment_delete?article_id={{$article["id"]}}&comment_id={{$comment["id"]}}" class="remove op-link ng-scope"><i class="icon-ic_phot_delete"></i>删除</a><!-- end ngIf: canRemove(comment) && state === 'normal' -->



                                                        <!-- ngIf: ownPost() && state === 'normal' && !comment.reviewing --><a ng-if="ownPost() &amp;&amp; state === 'normal' &amp;&amp; !comment.reviewing" ng-click="recommend(comment)" href="javascript:;" class="recommend op-link false"><i class="icon-ic_highlighted"></i>推荐</a><!-- end ngIf: ownPost() && state === 'normal' && !comment.reviewing -->

                                                        <!-- ngIf: !ownComment(comment) && state === 'normal' && !comment.reviewing -->
                                                    </div>

                                                    <!-- ngIf: canReply(comment) -->

                                                </div>
                                            </div>

                                        </li>
                                            @endforeach
                                    </ul>
                                    <div class="ui-spinner-container ng-scope" style="display: none;"><div class="ui-spinner use-css" ui-spinner=""></div></div><!-- ngIf: pages --><div class="pagination ng-scope ng-hide" ng-if="pages" ng-show="total>1">
                                        <!-- ngIf: current != 1 && total != 1 -->
                                        <!-- ngRepeat: p in pages track by $index --><button class="num btn btn-grey ng-binding ng-scope current btn-circle" ng-repeat="p in pages track by $index" ng-class="{current: p==current, disabled: p == '...',  'btn-circle': p==current, 'btn-circle-nborder': p!=current}" ng-click="changeTo(p, $event)" tabindex="0">1</button><!-- end ngRepeat: p in pages track by $index -->
                                        <!-- ngIf: current != total && total != 1 -->
                                    </div><!-- end ngIf: pages --></div>



                                </footer>
                    <div ng-show="zoomed" ng-animate="{show: &#39;in&#39;, hide: &#39;out&#39;}" class="lightbox-overlay ng-scope ng-hide"></div>
                </article>
            </div>
            <div class="recommend-posts ng-scope" ng-if="isPublished &amp;&amp; (!userColumn || isContributesAvailable())">
                <div class="receptacle" ng-switch="recommendPending">
                    <div class="block-title ng-scope" ng-class="scope.help &amp;&amp; block-title-help">
          <span ng-transclude="">
            <span class="ng-scope">推荐阅读</span></span>
                    </div>

                    <ul ng-switch-when="false" class="recommend-post-list ng-scope">

                        @foreach($recent_article_list as $a)
                        <li class="item ng-isolate-scope item-with-narrow-img" ng-class="itemClass" ng-repeat="post in recommendPosts" post="post" type="narrow" show-source="true" show-recommend="post.showRecommend">
                            <article class="hentry">
                                <a href="article?id={{$a["id"]}}" class="entry-link">
                                    <h1 class="entry-title ng-binding">{{$a["title"]}}</h1>

                                    <div class="title-img-container ng-scope" ng-if="titleImageShow">
                                        <div class="title-img-preview" ng-style="{&#39;background-image&#39;: &#39;url(&#39; + post.titleImage + &#39;)&#39;}" style="background-image: url(&quot;{{$a["face"]}}&quot;);"></div>
                                    </div>

                                    <section class="entry-summary">
                                        <p ui-summary="post.content" max="truncateMax" class="ng-isolate-scope">{{$a["abstracts"]}}…
                                            <span class="read-all">查看全文
                                            <i class="icon-ic_unfold"></i></span>
                                        </p>
                                    </section>
                                </a>
                                <footer>
                                    <div class="entry-meta">
                                        <a target="_blank" href="article/list?id={{$article["author"]["id"]}}" class="author name ng-binding">{{$article["author"]["username"]}}</a>
                                        <span class="bull" ng-click="test()">·</span>
                                        <time ng-class="{short: timeStyle == &#39;short&#39;}" ui-hover-title="2016 年 11 月 29 日星期二下午 1 点 52 分" ui-time="" datetime="2016-11-29T13:52:37+08:00" class="published ng-binding ng-isolate-scope hover-title">{{$a["publish_time"]}}</time>
                                    </div>

                                    <div class="entry-source ng-scope" ng-if="showSource &amp;&amp; post.column">
                                        <span class="source-prefix">发表于</span>

                                        <a href="https://zhuanlan.zhihu.com/yysaag" ng-if="post.column" class="ng-binding ng-scope">{{$a["publish_time"]}}</a>
                                        </div>
                                    </footer>
                            </article>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </main>

        @stop

    @section("page_level_js")
    <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/module.js"></script>
    <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/uploader.js"></script>
    <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/hotkeys.js"></script>
    <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/simditor.js"></script>
    <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/simditor-dropzone.js"></script>
    <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/simditor-fullscreen.js"></script>
    <script>
        var editor = new Simditor({
            textarea: $('#editor'),
            placeholder: '写下评论...',
            pasteImage: true,
            toolbarFloat: false,
            toolbarHidden: true,
            toolbar: [
                //'title',
                'bold',
                'italic',
                'underline',
                'strikethrough',
                //'fontScale',
                'color',
                'ol',
                'ul',
                'blockquote',
                'code',
                //'table',
                'link',
                'hr',
                'indent',
                'outdent',
                'alignment',
                //'fullscreen',
            ],
            upload: {
                url: '/upload'
            },
        });
        $(".simditor").addClass("receptacle");
        $(".simditor").attr("style","margin-left:66px;");
        $(".simditor-body").attr("style","min-height:88px;");

    </script>
        @stop