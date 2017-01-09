@extends("front/master")
    @section("page_level_css")
        <link href="<?php echo env('APP_URL');?>/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
        <link media="all" rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/styles/font-awesome.css" />
        <link media="all" rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/styles/simditor.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/styles/simditor-fullscreen.css" />
        <style>
            #submit
            {
                float:right;
            }
        </style>
        <style type="text/css">
           table {
               width: 100%;
               table-layout: fixed;
               border-collapse: collapse;
               border-spacing: 0;
               margin: 15px 0;
           }

            table thead {
               background-color: #f9f9f9;
           }

            table td{
                min-width: 40px;
                height: 30px;
                border: 1px solid #ccc;
                vertical-align: top;
                padding: 2px 4px;
                text-align: left;
                box-sizing: border-box;
            }

            table th {
                min-width: 40px;
                height: 30px;
                border: 1px solid #ccc;
                vertical-align: top;
                padding: 2px 4px;
                text-align: left;
                box-sizing: border-box;
            }

        </style>
    @stop
    @section("content")
        <main class="main-container ng-scope" ng-view="">
            <div class="main receptacle post-view ng-scope" ng-class="post.isTitleImageFullScreen &amp;&amp; winType != &#39;small&#39; &amp;&amp; !isCensoring &amp;&amp; &#39;full-screen-cover&#39;" ng-if="!notFound" data-za-module="PostItem">
                <article class="entry" ui-lightbox="">
                    <header>
                        @if ($article["face"]!="default")
                        <div class="entry-title-image ng-scope" ng-if="post.titleImage &amp;&amp; !isCensoring" ng-switch="!!(post.titleImageSize.width || (winType != &#39;small&#39; &amp;&amp; post.isTitleImageFullScreen))">
                            <img ng-switch-when="false" ng-src="" class="ng-scope" src="{{$article["face"]}}"></div>
                        @endif
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
                                    @foreach($article["tags"] as $tag)
                                    <a class="btn btn-green" href="article/list?type=tag&id={{$tag["id"]}}">{{$tag["name"]}}</a>
                                    <!--<span class="tag ng-binding ng-scope" ng-repeat="topic in post.topics | limitTo:3">{{$tag["name"]}}</span>-->
                                    @endforeach
                                </p>
                            </div>
                            <div class="entry-controls clearfix">
                                <div class="jiathis_style_32x32">
                                    <a class="jiathis_button_qzone"></a>
                                    <a class="jiathis_button_tsina"></a>
                                    <a class="jiathis_button_tqq"></a>
                                    <a class="jiathis_button_weixin"></a>

                                    <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
                                    <a class="jiathis_counter_style"></a>
                                </div>
                            </div>
                            <div class="entry-controls clearfix">

                                <div class="right-section">
                                    @if(null!==session("id") and session("id")==$article["author"]["id"] )
                                    <a href="article/edit?id={{$article["id"]}}" class="control-item post-edit-button ng-scope" ng-if="ownPost(post)"><i class="icon-edit"></i>编辑</a>
                                    @endif
                                    <a id="collect_btn" article_id="{{$article["id"]}}" href="javascript:;" class="control-item report ng-scope">
                                        <i class="icon-archive"></i>收藏</a>
                                        @if(null!==session("id") and session("id")==$article["author"]["id"] )
                                    <a ng-if="!ownPost(post) &amp;&amp; isPublished" ng-click="report(post)" href="article/delete?id={{$article["id"]}}" class="control-item report ng-scope">
                                        <i class="icon-trash"></i>删除</a>
                                    @endif
                                    <!--<div ng-transclude="" class="post-options-button post-menu-button menu-button-no-arrow ui-menu-button ng-scope close" ng-class="{ true: &#39;open&#39;, false: &#39;close&#39; }[open]" ui-menu-button="" ng-if="ownPost(post)" toggle-delay="250">
                                        <a href="javascript:;" class="menu-button control-item options ng-scope">
                                            <i class="icon-ic_column_more"></i><span class="hide-text">设置</span>
                                        </a>
                                        <menu class="menu ng-scope">
                                            <a href="javascript:;" ng-click="removePost()" class="menu-item" tabindex="0">删除文章</a>
                                        </menu>
                                    </div>-->
                                        <!-- JiaThis Button BEGIN -->


                                        <!-- JiaThis Button END -->
                                    </div>
                                <div class="left-section ng-scope" ng-if="isPublished">
                                    <div class="votes">

                                        <a ng-if="!ownPost(post)" count="{{$article["likes"]}}" id="like_btn" ng-click="post.toggleLike()" class="control-item ng-binding ng-scope" article_id="{{$article["id"]}}" href="javascript:" ng-class="{ active: post.rating == &#39;like&#39; }">
                                            <i class="icon-thumbs-up"></i>{{$article["likes"]}}</a>

                                    </div>


                                </div>


                                <div class="entry-comments post-comments comment-box ng-isolate-scope empty" ng-show="expanded" ng-class="{ empty: !pending &amp;&amp; !comments.length }" ng-switch="pending" id="comments" ui-post-comments="" comments-placeholder="写下你的评论" comment-need-review="commentNeedReview" comments-href="post.links.comments" comments-expanded="true" comments-post-owner="post.author" comments-status="commentsStatus" ng-if="isPublished &amp;&amp; !isQQNews" comments-style="pagination" locate-comment-id="locateCommentId">
                                    <div class="box-header" ng-switch="!!(isPostOwner(me) &amp;&amp; me.isOrg)">

                                        <div ng-switch-when="false" class="ng-scope">
                                            <div class="block-title ng-scope" ng-class="scope.help &amp;&amp; block-title-help">
        <span ng-transclude="">
          <span class="ng-binding ng-scope">评论</span>
          <!--<span ng-include="'/views/post-comments-settings.html'" class="ng-scope">
            <div ng-transclude="" class="comment-setting-button menu-button-no-arrow ui-menu-button ng-scope" ng-class="{ true: 'open', false: 'close' }[open]" ui-menu-button="" ng-if="isPostOwner(me)">
              <a href="javascript:;" class="menu-button comment-setting-button ng-scope">

                <i class="icon-ic_column_more ng-scope" ng-if="ownPost()"></i>

                <span class="hide-text">评论设置</span></a>
              <menu class="menu ng-scope">

                <label class="menu-item ng-binding ng-scope" ng-repeat="item in commentSettingMenuItems" tabindex="0">
                  <input name="comment-settting" type="radio" value="anyone" class="mui-radio ng-pristine ng-valid" ng-model="status.permission" ng-click="onClickCommentSettingItem($event)">所有人都能评论该文章</label>

                <label class="menu-item ng-binding ng-scope" ng-repeat="item in commentSettingMenuItems" tabindex="0">
                  <input name="comment-settting" type="radio" value="friends" class="mui-radio ng-pristine ng-valid" ng-model="status.permission" ng-click="onClickCommentSettingItem($event)">只有作者关注的人才能评论该文章</label>

                <label class="menu-item ng-binding ng-scope" ng-repeat="item in commentSettingMenuItems" tabindex="0">
                  <input name="comment-settting" type="radio" value="none" class="mui-radio ng-pristine ng-valid" ng-model="status.permission" ng-click="onClickCommentSettingItem($event)">关闭评论</label>
              </menu>
            </div>
              </span>-->
        </span>
                                                <!-- ngIf: help --></div>
                                        </div>
                                        <!-- ngSwitchWhen: true --></div>

                                    <div ng-switch-when="false" class="ng-scope">

                                        <form action="article/comment" method="post" enctype="multipart/form-data" class="comment-form comment-box-ft ng-scope ng-invalid ng-invalid-content-required ng-dirty expanded" ng-class="{ 'expanded': formExpanded }" name="commentForm" ng-if="(status.canComment || status.forceShowCommentForm) &amp;&amp; state === 'normal'">
                                            @if(null!==session("avatar") and "default"!==session("avatar"))
                                            <img class="avatar avatar-small ng-scope" src="<?php echo session("avatar"); ?>">
                                            @endif

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
                                                    <img class="avatar avatar-small" src="{{$comment["avatar"]}}" />
                                                </a>

                                                <div class="comment-body" ng-init="reply = {content: '', hidden: true}">


                                                    <div class="comment-hd" ng-class="{'comment-hd-conversation': comment.inReplyToCommentId}">
                                                        <a href="https://www.zhihu.com/people/lucas-35-31" target="_blank" class="ng-binding">{{$comment["username"]}}</a>

                                                        <span ng-if="isPostOwner(comment.author)" class="ng-scope"></span>
                                                        <span class="in-reply-to ng-hide" ng-show="comment.inReplyToUser">
                                                            回复 <a href="" class="ng-binding"></a>
                                                        </span>

                                                    </div>

                                                    <div class="comment-content ng-binding" ng-bind-html="comment.content">{!! $comment["content"] !!}</div>

                                                    <div class="comment-ft clearfix">
                                                        <time ng-class="{short: timeStyle == 'short'}" ui-hover-title="2016 年 12 月 29 日星期四晚上 11 点 24 分" ng-if="timeStyle != 'shor'" ui-time="" datetime="2016-12-29T23:24:34+08:00" class="date ng-binding ng-scope ng-isolate-scope hover-title" time-style="timeStyle">{{$comment["publish_time"]}}</time><!-- end ngIf: timeStyle != 'shor' -->

                                                        <span class="like-num nil" title="0 人觉得这个很赞"><span class="ng-binding">0</span> <span>赞</span></span>
                                                        @if(null!==session("id") and session("id")==$comment["user_id"] )
                                                       <a ng-if="canRemove(comment) &amp;&amp; state === 'normal'" ng-click="remove(comment)" href="article/comment_delete?article_id={{$article["id"]}}&comment_id={{$comment["id"]}}" class="remove op-link ng-scope"><i class="icon-ic_phot_delete"></i>删除</a>
                                                        <!--<a href="javascript:;" class="recommend op-link false"><i class="icon-ic_highlighted"></i>回复</a>-->
                                                        @endif
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
                                        <time ng-class="{short: timeStyle == &#39;short&#39;}" ui-hover-title="2016 年 11 月 29 日星期二下午 1 点 52 分" ui-time="" datetime="2016-11-29T13:52:37+08:00" class="published ng-binding ng-isolate-scope hover-title"></time>
                                    </div>

                                    <div class="entry-source ng-scope" ng-if="showSource &amp;&amp; post.column">
                                        <span class="source-prefix">发表于</span>

                                        <a href="#" ng-if="post.column" class="ng-binding ng-scope">{{$a["publish_time"]}}</a>
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
    <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
    <script src="<?php echo env('APP_URL');?>/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
    <script src="<?php echo env('APP_URL');?>/assets/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>
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
                url: '<?php echo env('APP_URL');?>/public/upload_img',
                fileKey: 'img_name',
                params: null,
                connectionCount: 3,
            },
        });
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


        $(".simditor").addClass("receptacle");
        $(".simditor").attr("style","margin-left:66px;");
        $(".simditor-body").attr("style","min-height:88px;");

        $('#like_btn').click(function(){
            var article_id=$('#like_btn').attr("article_id");

            old = parseInt($("#like_btn").attr('count'))+1;

            $("#like_btn").html("<i class=\"icon-ic_column_like\"></i>"+old+"</a>");
            console.log(article_id);
            $.ajax({
                type: "GET",
                url: "<?php echo env('APP_URL');?>/article/like?id="+article_id,
                data: {username:$("#username").val(), content:$("#content").val()},
                dataType: "json",
                success: function(data){
                    //alert("1");
                    console.log(eval(data));
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
        });

        $('#collect_btn').click(function(){

            $.ajax({
                type: "GET",
                url: "<?php echo env('APP_URL');?>/article/collect?id="+$('#collect_btn').attr("article_id"),
                data: {username:$("#username").val(), content:$("#content").val()},
                dataType: "json",
                success: function(data){
                    //alert("1");
                    toastr.success("收藏成功");
                    console.log(eval(data));
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
        });

    </script>
        @stop