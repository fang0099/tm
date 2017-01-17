<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/medium/css/fonts-base.by5Oi_VbnwEIvhnWIsuUjA.css" />
    <link rel="stylesheet" href="/medium//css/main-base.DXRTjnLFuixac_1N94VDnw.css" />
    <link rel="stylesheet" href="/jquery-wznav/css.css">
    <link rel="stylesheet" href="/zhuanlan/css/main.css">
    <link rel="stylesheet" href="/zhuanlan/css/icomoon.css">
    <link rel="stylesheet" href="/zhuanlan/css/mine.css">
</head>
<body itemscope="" class="browser-chrome os-mac is-withMagicUnderlines is-js" data-action-scope="_actionscope_0">

<!-- head begin -->

<div id="header-holder">
    <header id="header" class="navbar ng-scope ng-isolate-scope" fixed="scrollBackFixedNavbar">
        <div class="navbar-logo-container">
            <a href="" class="logo icon-ic_zhihu_logo" aria-label="首页"></a>
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
            <a href="/article/edit" >
                <i class="icon-edit"></i>写文章
            </a>
            <a href="/uc#notice" style="margin : 0px 5px 0px 15px">
                <i class="icon-bell"></i>
            </a>
        </div>
        <div class="navbar-content"></div>
    </header>
    <div class="find_nav">
        <div class="find_nav_left">
            <div class="find_nav_list">
                @if(isset($page_class) and $page_class == "page-write2")
                    <a href="#" class="btn">修改</a>
                    <a href="#" class="btn">草稿</a>
                @else

                    <ul>
                    @if(isset($menu_tags))
                        @foreach($menu_tags as $tag)
                            <!--<li class="find_nav_cur"><a href="article/list?type=tag&id={{$tag["id"]}}">{{$tag["name"]}}</a></li>-->
                                <li class=""><a href="/article/list?type=tag&id={{$tag["id"]}}">{{$tag["name"]}}</a></li>
                            @endforeach
                        @endif
                        <li class="sideline"></li>
                    </ul>
                @endif
            </div>
        </div>

    </div>

</div>

<!-- head end -->

<div class="site-main surface-container" id="container">
    <div class="surface">
        <div id="prerendered" class="screenContent">
    <div class="butterBar butterBar--error" data-action-scope="_actionscope_1"></div>
    <div id="_obv.shell._surface_1484562685269" class="surface" style="visibility: visible; display: block;">
        <div class="screenContent surface-content">

            <div class="u-sizeViewHeightMin100" style="margin-top: 10px;">
                <div class="u-backgroundWhite">
                    <div class="container u-maxWidth1040">
                        <!--<div class="hero hero--standalone hero--alignLeft u-paddingTop40 u-paddingBottom20">
                            <h1 class="hero-title">推荐页面</h1>
                        </div>-->
                        <div class="js-followTabs">
                            <ul class="browsableStreamTabs">
                                <li class="browsableStreamTabs-item"><a class="link
                                        @if(isset($tags))
                                            link--darker
                                        @endif
                                            link--darken u-accentColor--textDarken u-baseColor--link" href="<?php echo env('APP_URL');?>/suggestion_tag">标签</a></li>
                                <li class="browsableStreamTabs-item"><a class="link
                                        @if(isset($users))
                                            link--darker
                                        @endif
                                            link--darken u-accentColor--textDarken u-baseColor--link" href="<?php echo env('APP_URL');?>/suggestion_user">作者</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container u-maxWidth1040">
                    <div class="row">
                        <div class="col u-size8of12 u-xs-size12of12 u-xs-padding0 followedStreamItems">
                            <div class="js-followedStreamItems">
                                <div class="streamItem streamItem--heading js-streamItem">
                                    <div class="streamItemHeading container u-maxWidth660 u-padding0">
                                        <div class="heading u-clearfix u-borderTop2 u-borderTopColorDarker u-borderBottomLight u-paddingTop30 u-paddingBottom30 u-paddingLeft20 u-backgroundWhite">
                                            <div class="u-clearfix">
                                                <div class="heading-content u-floatLeft">
                                                    <span class="heading-title heading-title--semibold u-textColorDarker u-fontSizeBase u-fontWeightMedium">
                                                        @if(isset($tags))
                                                            推荐标签
                                                        @else
                                                            推荐作者
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(isset($users))
                                    @foreach($users as $user)
                                <div class="streamItem streamItem--userPreview js-streamItem">
                                    <div class="streamItem-card streamItem-card--userPreview u-marginBottom0 u-backgroundWhite">
                                        <div class="streamItem-cardInner streamItem-cardInner--userPreview u-paddingRight20 u-paddingLeft20">

                                            <div class="u-flexCenter">
                                                <div class="u-width60 u-flex0 u-marginRight20">
                                                    <a class="link avatar u-baseColor--link" href="/article/list?id={{$user['id']}}" ><img src="{{$user["avatar"]}}" class="avatar-image avatar-image--small"  /></a>
                                                </div>
                                                <div class="u-flex1 u-flexCenter u-xs-inline">
                                                    <div class="u-flex1 u-overflowHidden u-marginRight20">
                                                        <a class="link link--darker link--darken u-accentColor--textDarken u-block u-fontSizeSmall u-baseColor--link" href="/article/list?id={{$user['id']}}" >{{$user["username"]}}</a>
                                                        <a class="link link--darken u-accentColor--textDarken u-block u-fontSizeSmaller u-textColorNormal u-textOverflowEllipsis u-xs-lineClamp2 u-baseColor--link" href="javascript:;" style="margin-top: 10px;">{{$user["brief"]}}</a>
                                                    </div>
                                                    <div class="u-flex0 u-xs-floatLeft">
                                                        <span class="followState js-followState buttonSet-inner" data-user-id="3401caea7d08">
                                                            <button class="button button--primary u-noUserSelect button--withChrome u-accentColor--buttonNormal button--follow js-followButton is-touched" data-action="toggle-subscribe-user" data-action-value="3401caea7d08" data-action-source="personalization_main---------1----------_follow" data-subscribe-source="personalization_main---------1----------">
                                                                <span class="button-label  button-defaultState js-buttonLabel">关注</span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                    @endif
                                    @if(isset($tags))
                                        @foreach($tags as $tag)
                                            <div class="streamItem streamItem--userPreview js-streamItem">
                                                <div class="streamItem-card streamItem-card--userPreview u-marginBottom0 u-backgroundWhite">
                                                    <div class="streamItem-cardInner streamItem-cardInner--userPreview u-paddingRight20 u-paddingLeft20">

                                                        <div class="u-flexCenter">
                                                            <div class="u-width60 u-flex0 u-marginRight20">
                                                                <a class="link avatar u-baseColor--link" href="/article/list?type=tag&id={{$tag['id']}}" >
                                                                    <img src="{{$tag["face"]}}" class="avatar-image avatar-image--small"  />
                                                                </a>
                                                            </div>
                                                            <div class="u-flex1 u-flexCenter u-xs-inline">
                                                                <div class="u-flex1 u-overflowHidden u-marginRight20">
                                                                    <a class="link link--darker link--darken u-accentColor--textDarken u-block u-fontSizeSmall u-baseColor--link" href="/article/list?type=tag&id={{$tag['id']}}" >{{$tag["name"]}}</a>
                                                                    <a class="link link--darken u-accentColor--textDarken u-block u-fontSizeSmaller u-textColorNormal u-textOverflowEllipsis u-xs-lineClamp2 u-baseColor--link"  style="margin-top: 10px;" href="javascript:;"  >{{$tag["brief"]}}</a>
                                                                </div>
                                                                <div class="u-flex0 u-xs-floatLeft">
                                                        <span class="followState js-followState buttonSet-inner" data-user-id="3401caea7d08">
                                                            <button class="button button--primary u-noUserSelect button--withChrome u-accentColor--buttonNormal button--follow js-followButton is-touched" data-action="toggle-subscribe-user" data-action-value="3401caea7d08" data-action-source="personalization_main---------1----------_follow" data-subscribe-source="personalization_main---------1----------">
                                                                <a href="/article/list?type=tag&id={{$tag['id']}}" style="text-decoration: none" class="button-label  button-defaultState js-buttonLabel">关注</a>
                                                            </button>
                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                </div>
                                        @endforeach
                                    @endif
                            </div>
                        </div>
                        <aside class="col u-size4of12 u-xs-hide u-paddingBottom20" data-scroll="native">
                            <div class="heading u-clearfix heading--borderedBottom u-textColorNormal u-fontSizeSmaller">
                                <div class="u-clearfix">
                                    <div class="heading-content u-floatLeft">
                                        <span class="heading-title u-textColorNormal u-fontSizeSmaller">为您推荐</span>
                                    </div>
                                    <!--
                                    <div class="heading-content u-floatRight">
                                        <a class="link link--darken u-accentColor--textDarken u-baseColor--link" href="https://medium.com/me/following/suggestions">See more</a>
                                    </div>
                                    -->
                                </div>
                            </div>
                            @foreach($hot_tag as $t)
                            <div class="js-suggestionSidebar suggestionSidebar" style="margin: 10px 0px">
                                <div class="streamItem streamItem--userPreview js-streamItem">
                                    <div class="u-flexCenter u-paddingBottom10 u-paddingTop10">
                                        <div class="u-width50">
                                            <a class="link avatar u-baseColor--link" href="#" data-action="show-user-card" >
                                                <img src="{{ $t['face'] }}" class="avatar-image avatar-image--smaller"  />
                                            </a>
                                        </div>
                                        <a class="link link--darker link--darken u-accentColor--textDarken u-fontSizeSmaller u-flex1 u-baseColor--link" href="/article/list?type=tag&id={{$t['id']}}">{{$t['name']}}</a>
                                        <span class="followState js-followState buttonSet-inner" data-user-id="d4bef96b743c">
                                            <button class="button button--primary button--chromeless u-noUserSelect u-accentColor--buttonNormal button--follow js-followButton" >
                                                <a href="/article/list?type=tag&id={{$t['id']}}" class="button-label  button-defaultState js-buttonLabel">关注</a>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>
</body>
</html>