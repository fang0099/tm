@extends("front/master")
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

                                    <a ng-if="!ownPost(post) &amp;&amp; isPublished" ng-click="report(post)" href="javascript:;" class="control-item report ng-scope">
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

                                        <a ng-if="!ownPost(post)" ng-click="post.toggleLike()" class="control-item ng-binding ng-scope" href="javascript:;" ng-class="{ active: post.rating == &#39;like&#39; }">
                                            <i class="icon-ic_column_like"></i>{{$article["likes"]}}</a>

                                    </div>


                                    <!--<div class="entry-controls clearfix" style="text-align: left">
                                        <div class="right-section">
                                            <div ng-transclude="" class="post-share-button post-menu-button menu-button-no-arrow ui-menu-button ng-scope close" ng-class="{ true: &#39;open&#39;, false: &#39;close&#39; }[open]" ui-menu-button="" onbeforeopen="beforeShareMenuOpen()" ng-if="isPublished &amp;&amp; !supportTouch">
                                                <a href="javascript:;" class="menu-button control-item share ng-scope"><i class="icon-ic_column_share"></i>分享</a>
                                                <menu class="menu ng-scope">
                                                    <button ng-click="item.action($event)" class="menu-item ng-binding ng-scope menu-item-sina" ng-repeat="item in shareMenuItems" ng-class="item.className" tabindex="0">
                                                        <i class="icon icon-ic_share_sina"></i>新浪微博

                                                    </button><button ng-click="item.action($event)" class="menu-item ng-binding ng-scope menu-item-wechat" ng-repeat="item in shareMenuItems" ng-class="item.className" tabindex="0">
                                                        <i class="icon icon-ic_share_wechat"></i>微信扫一扫
                                                        <div class="extra ng-binding ng-scope" ng-if="item.html" ng-bind-html="item.html"><div class="ShareQRCode" title="https://zhuanlan.zhihu.com/p/24555811#showWechatShareTip"><canvas width="100" height="100" style="display: none;"></canvas><img style="display: block;" src="data:image/png;base64,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"></div></div>
                                                    </button><button ng-click="item.action($event)" class="menu-item ng-binding ng-scope menu-item-dudu" ng-repeat="item in shareMenuItems" ng-class="item.className" tabindex="0">
                                                        <i class="icon icon-ic_share_dudu"></i>读读日报

                                                    </button>
                                                </menu>
                                            </div>

                                           <a href="https://zhuanlan.zhihu.com/p/24555811/edit" class="control-item post-edit-button ng-scope" ng-if="ownPost(post)"><i class="icon-ic_column_edit"></i>编辑</a>

                                            <div ng-transclude="" class="post-options-button post-menu-button menu-button-no-arrow ui-menu-button ng-scope close" ng-class="{ true: &#39;open&#39;, false: &#39;close&#39; }[open]" ui-menu-button="" ng-if="ownPost(post)" toggle-delay="250">
                                                <a href="javascript:;" class="menu-button control-item options ng-scope">
                                                    <i class="icon-ic_column_more"></i><span class="hide-text">设置</span>
                                                </a>
                                                <menu class="menu ng-scope">
                                                    <a href="javascript:;" ng-click="removePost()" class="menu-item" tabindex="0">删除文章</a>
                                                </menu>
                                            </div>



                                        </div>

                                        <div class="left-section ng-scope" ng-if="isPublished">
                                            <div class="votes">
                                                <a ng-if="ownPost(post)" class="control-item disabled ng-binding ng-scope" href="javascript:;"><i class="icon-ic_column_like"></i>0</a>
                                            </div>
                                        </div>

                                    </div>-->


                                    <!-- ngIf: likers && isPublished --></div>

                                <div ng-include="&#39;/views/post-includes.html&#39;" class="included included-pc fx-item-fade ng-scope" ng-if="contributes.length &amp;&amp; isPublished">
                                    <div class="block-title ng-scope" ng-class="scope.help &amp;&amp; block-title-help">
              <span ng-transclude="">
                <!--<span class="ng-scope">文章被以下专栏收录</span></span>
                                        </div>
                                    <ul class="included-items ng-scope" ng-click="handleContributeClick($event)">

                                        <li class="column-list-item fx-item-fade ng-isolate-scope" column="contribute.column" ng-repeat="contribute in contributes" contribute-info="contribute" index="$index">
                                            <p class="avatar">
                                                <a href="https://zhuanlan.zhihu.com/yysaag">
                                                    <img alt="" ng-src="https://pic2.zhimg.com/2e3ee1c6468df0b7d2e2ea45f349a5a1_l.jpeg" class="avatar-mid" src="{{$article["author"]["avatar"]}}"></a>
                                            </p>
                                            <p class="title">
                                                <a class="column-name ng-binding" href="https://zhuanlan.zhihu.com/yysaag">{{$article["author"]["username"]}}</a>
                                                <span ng-show="contributeInfo.state == &#39;need_approved&#39;" class="bull ng-hide">·</span>
                                                <a ng-show="contributeInfo.state == &#39;need_approved&#39;" href="javascript:;" class="cancel-contribute ng-hide" ng-click="handleCancelContribute()">投稿中</a></p>
                                            <p class="intro ng-binding"></p>
                                            <a href="https://zhuanlan.zhihu.com/yysaag" class="btn btn-green-nborder enter">进入专栏</a></li>
                                        </ul>
                                </div>-->

                               <!-- <div class="entry-comments post-comments comment-box ng-isolate-scope" ng-show="expanded" ng-class="{ empty: !pending &amp;&amp; !comments.length }" ng-switch="pending" id="comments" ui-post-comments="" comments-placeholder="写下你的评论" comment-need-review="commentNeedReview" comments-href="post.links.comments" comments-expanded="true" comments-post-owner="post.author" comments-status="commentsStatus" ng-if="isPublished &amp;&amp; !isQQNews" comments-style="pagination" locate-comment-id="locateCommentId">
                                    <div class="box-header" ng-switch="!!(isPostOwner(me) &amp;&amp; me.isOrg)">

                                        <div ng-switch-when="false" class="ng-scope">
                                            <div class="block-title ng-scope" ng-class="scope.help &amp;&amp; block-title-help">
                                              <span ng-transclude="">
                                                <span class="ng-binding ng-scope">{{$article["comment_num"]}} 条评论</span>

                                                <span ng-include="&#39;/views/post-comments-settings.html&#39;" class="ng-scope">
                                                  </span>
                                              </span>
                                            </div>
                                        </div>
                                       </div>

                                    <div ng-switch-when="false" class="ng-scope">

                                        <form class="comment-form comment-box-ft ng-scope ng-invalid ng-invalid-content-required ng-dirty" ng-class="{ &#39;expanded&#39;: formExpanded }" name="commentForm" ng-if="(status.canComment || status.forceShowCommentForm) &amp;&amp; state === &#39;normal&#39;">
                                            <img class="avatar avatar-small ng-scope" ng-src="https://pic1.zhimg.com/da8e974dc_l.jpg" ng-if="me.authed()" src="./一块带给无数人年少欢乐的CPU，文曲星和小霸王都用过它 - 游研社 - 知乎专栏_files/da8e974dc_l.jpg">


                                           <div class="editable ng-invalid ng-invalid-content-required ng-dirty" ui-scraper="" scraper-options="scraperOptions" ui-mention="" ui-clean-paste="" ui-events="{focus:&#39;handleInputFocus($event)&#39;}" ui-ctrl-enter="addComment()" contenteditable="true" content-required="" ng-model="editingComment.content" holdertext="写下你的评论" name="content" toggle-delay="250">
                                                </div>

                                            <div class="command clearfix ng-scope" ng-if="me.authed()">
                                                <button ng-disabled="savePending || !editingComment.content.replace(&#39;&lt;br&gt;&#39;, &#39;&#39;).trim()" ng-click="addComment()" class="save btn btn-blue" disabled="disabled">评论</button>
                                                <button ng-click="expandForm(false, $event)" class="cancel btn btn-grey-nborder">取消</button></div>
                                           </form>
                                        <div class="comment-list-container ng-scope ng-isolate-scope ui-pagination" ng-if="loadStyle == &#39;pagination&#39;" url="commentHrefMap[state]" data="oriComments" extra="commentCountMap[state]" index="locateItemIndex" ui-pagination="">
                                            <ul class="comment-list">
                                                <li class="comment-item" id="comment-192689150" ui-events="{focusin: &#39;focusin = true&#39;, focusout: &#39;focusin = false&#39;}" ng-class="{focusin: focusin, &#39;comment-item-deleted&#39;: comment.deleted}" ng-switch="!!comment.deleted" ng-repeat="comment in comments track by comment.id">

                                                    <div ng-switch-when="false" class="comment-item-inner-normal ng-scope">
                                                        <a ui-hovercard="" target="_blank" class="avatar-link" title="砰砰博士" href="https://www.zhihu.com/people/ceng-sheng-pu" tabindex="-1">
                                                            <img ng-src="https://pic1.zhimg.com/da8e974dc_l.jpg" class="avatar avatar-small" src="./一块带给无数人年少欢乐的CPU，文曲星和小霸王都用过它 - 游研社 - 知乎专栏_files/da8e974dc_l.jpg"></a>
                                                        <div class="comment-body" ng-init="reply = {content: &#39;&#39;, hidden: true}">

                                                            <div class="comment-hd" ng-class="{&#39;comment-hd-conversation&#39;: comment.inReplyToCommentId}">
                                                                <a href="https://www.zhihu.com/people/ceng-sheng-pu" target="_blank" class="ng-binding">砰砰博士</a>

                                                                <span class="in-reply-to ng-hide" ng-show="comment.inReplyToUser">回复
                            <a href="https://zhuanlan.zhihu.com/" class="ng-binding"></a>
                                                                    </span>
                                                                </div>
                                                            <div class="comment-content ng-binding" ng-bind-html="comment.content">扫地扫地我扫地
                                                                <br>地上还有西瓜皮
                                                                <br>婆婆家中欠打扫
                                                                <br>尘土满天难呼吸</div>
                                                            <div class="comment-ft clearfix">

                                                                <time ng-class="{short: timeStyle == &#39;short&#39;}" ui-hover-title="2016 年 11 月 28 日星期一下午 3 点 09 分" ng-if="timeStyle != &#39;shor&#39;" ui-time="" datetime="2016-11-28T15:09:37+08:00" class="date ng-binding ng-scope ng-isolate-scope hover-title" time-style="timeStyle">1 个月前</time>

                                                                <span class="like-num liked" title="91 人觉得这个很赞">
                                                                <span class="ng-binding">91</span>
                                                                <span>赞</span></span>

                                                                <a ng-if="canReply(comment) &amp;&amp; state === &#39;normal&#39;" ng-click="toggleReplyForm(reply)" href="javascript:;" class="reply op-link ng-scope">
                                                                    <i class="icon-ic_column_reply"></i>回复</a>

                                                                <a ng-if="!ownComment(comment) &amp;&amp; state === &#39;normal&#39; &amp;&amp; !comment.reviewing" ng-click="like(comment)" href="javascript:;" class="like op-link">
                                                                    <i class="icon-ic_comment_like"></i>赞</a>

                                                                <a ng-if="!ownComment(comment) &amp;&amp; state === &#39;normal&#39; &amp;&amp; !comment.reviewing" ng-click="report(comment)" href="javascript:;" class="report op-link ng-scope">
                                                                    <i class="icon-ic_column_report"></i>举报</a>

                                                            <form name="replyForm" class="comment-form comment-reply-form expanded hidden ng-scope ng-invalid ng-invalid-content-required ng-dirty" ng-if="canReply(comment)" ng-class="{hidden: reply.hidden}">
                                                                <img class="avatar avatar-small" ng-src="https://pic1.zhimg.com/da8e974dc_l.jpg" src="./一块带给无数人年少欢乐的CPU，文曲星和小霸王都用过它 - 游研社 - 知乎专栏_files/da8e974dc_l.jpg">
                                                                <div class="editable ng-invalid ng-invalid-content-required ng-dirty" ui-focus-me="!reply.hidden" ui-ctrl-enter="replyComment(comment, reply, replyForm)" ui-scraper="" scraper-options="scraperOptions" ui-mention="" ui-clean-paste="" contenteditable="true" content-required="" ng-model="reply.content" holdertext="写下你的评论">
                                                                    <span class="holdertext" holdertext="1" contenteditable="false">写下你的评论</span></div>

                                                                <div class="command clearfix ng-scope" ng-if="me.authed()">
                                                                    <button ng-disabled="reply.pending || !reply.content.replace(&#39;&lt;br&gt;&#39;, &#39;&#39;).trim()" ng-click="replyComment(comment, reply, replyForm)" class="save btn btn-blue" disabled="disabled">评论</button>
                                                                    <button ng-click="reply.hidden = true" class="cancel btn btn-grey-nborder">取消</button></div>
                                                                </form>
                                                            </div>
                                                    </div>
                                                </li>

                                                </ul>
                                            <div class="ui-spinner-container ng-scope" style="display: none;">
                                                <div class="ui-spinner use-css" ui-spinner=""></div>
                                            </div>

                                            <div class="pagination ng-scope" ng-if="pages" ng-show="total&gt;1">

                                                <button class="num btn btn-grey ng-binding ng-scope current btn-circle" ng-repeat="p in pages track by $index" ng-class="{current: p==current, disabled: p == &#39;...&#39;,  &#39;btn-circle&#39;: p==current, &#39;btn-circle-nborder&#39;: p!=current}" ng-click="changeTo(p, $event)" tabindex="0">1</button>

                                                <button class="num btn btn-grey ng-binding ng-scope btn-circle-nborder" ng-repeat="p in pages track by $index" ng-class="{current: p==current, disabled: p == &#39;...&#39;,  &#39;btn-circle&#39;: p==current, &#39;btn-circle-nborder&#39;: p!=current}" ng-click="changeTo(p, $event)" tabindex="0">2</button>

                                                <button class="num btn btn-grey ng-binding ng-scope btn-circle-nborder" ng-repeat="p in pages track by $index" ng-class="{current: p==current, disabled: p == &#39;...&#39;,  &#39;btn-circle&#39;: p==current, &#39;btn-circle-nborder&#39;: p!=current}" ng-click="changeTo(p, $event)" tabindex="0">3</button>

                                                <button class="num btn btn-grey ng-binding ng-scope btn-circle-nborder" ng-repeat="p in pages track by $index" ng-class="{current: p==current, disabled: p == &#39;...&#39;,  &#39;btn-circle&#39;: p==current, &#39;btn-circle-nborder&#39;: p!=current}" ng-click="changeTo(p, $event)" tabindex="0">4</button>

                                                <button class="num btn btn-grey ng-binding ng-scope disabled btn-circle-nborder" ng-repeat="p in pages track by $index" ng-class="{current: p==current, disabled: p == &#39;...&#39;,  &#39;btn-circle&#39;: p==current, &#39;btn-circle-nborder&#39;: p!=current}" ng-click="changeTo(p, $event)" tabindex="-1">...</button>

                                                <button class="num btn btn-grey ng-binding ng-scope btn-circle-nborder" ng-repeat="p in pages track by $index" ng-class="{current: p==current, disabled: p == &#39;...&#39;,  &#39;btn-circle&#39;: p==current, &#39;btn-circle-nborder&#39;: p!=current}" ng-click="changeTo(p, $event)" tabindex="0">11</button>

                                                <button tabindex="0" class="next btn btn-grey-nborder ng-scope" ng-if="current != total &amp;&amp; total != 1" ng-click="changeTo(current+1, $event)">下一页</button>
                                            </div>
                                            </div>
                                        </div>
                                </div>-->
                                <!--<div ng-include="&#39;/views/post-includes.html&#39;" class="included included-mobile fx-item-fade ng-scope" ng-if="contributes.length &amp;&amp; isPublished">
                                    <div class="block-title ng-scope" ng-class="scope.help &amp;&amp; block-title-help">
                                      <span ng-transclude="">
                                        <span class="ng-scope">文章tag</span></span>
                                       </div>
                                    <ul class="included-items ng-scope" ng-click="handleContributeClick($event)">

                                        <li class="column-list-item fx-item-fade ng-isolate-scope" column="contribute.column" ng-repeat="contribute in contributes" contribute-info="contribute" index="$index">
                                            <p class="avatar">
                                                <a href="https://zhuanlan.zhihu.com/yysaag">
                                                    <img alt="" ng-src="https://pic2.zhimg.com/2e3ee1c6468df0b7d2e2ea45f349a5a1_l.jpeg" class="avatar-mid" src="./一块带给无数人年少欢乐的CPU，文曲星和小霸王都用过它 - 游研社 - 知乎专栏_files/2e3ee1c6468df0b7d2e2ea45f349a5a1_l.jpeg"></a>
                                            </p>
                                            <p class="title">
                                                <a class="column-name ng-binding" href="https://zhuanlan.zhihu.com/yysaag">游研社</a>
                                                <span ng-show="contributeInfo.state == &#39;need_approved&#39;" class="bull ng-hide">·</span>
                                                <a ng-show="contributeInfo.state == &#39;need_approved&#39;" href="javascript:;" class="cancel-contribute ng-hide" ng-click="handleCancelContribute()">投稿中</a></p>
                                            <p class="intro ng-binding"></p>
                                            <a href="https://zhuanlan.zhihu.com/yysaag" class="btn btn-green-nborder enter">进入专栏</a></li>
                                    </ul>
                                </div>-->
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
                                        <a target="_blank" href="https://www.zhihu.com/people/you-yan-she-48" class="author name ng-binding">小研</a>
                                        <span class="bull" ng-click="test()">·</span>
                                        <time ng-class="{short: timeStyle == &#39;short&#39;}" ui-hover-title="2016 年 11 月 29 日星期二下午 1 点 52 分" ui-time="" datetime="2016-11-29T13:52:37+08:00" class="published ng-binding ng-isolate-scope hover-title">1 个月前</time>
                                    </div>

                                    <div class="entry-source ng-scope" ng-if="showSource &amp;&amp; post.column">
                                        <span class="source-prefix">发表于</span>

                                        <a href="https://zhuanlan.zhihu.com/yysaag" ng-if="post.column" class="ng-binding ng-scope">游研社</a>
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