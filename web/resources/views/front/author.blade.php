<!DOCTYPE html>
<html>
<head>
	<title>{{$author['username']}}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="/usercenter/css/style.css">
	<link rel="stylesheet" type="text/css" href="/usercenter/css/responsive.css">
	<link rel="stylesheet" href="/usercenter/css/toastr.css">

</head>
<body>

	<div class="container">
		<header class="p-header new-header p-header-show">
		    <div class="first-nav">
		        <div class="options">
		        	
		            <a href="/article/edit" class="btn btn-x-small orange post-edit">写稿</a>
					<!--
					<a href="/uc#notice"> <i class="icon-bell2"  style="width: 20px"></i></a>
					-->
					
		            <div class="dropdown-menu-part">
		            	@if(session('id'))
		                <span class="setting">
		                    <a title="{{ session('username') }}" href="javascript:void(0)" class="avatar" id="user-avatar">
		                        <img width="34" height="34" alt="{{session('username')}}" src="{{ session('avatar') }}">
		                    </a>
		                </span>
		                @else
		                <span class="unlogin">
		                    <a href="/account#login" title="登录" rel="nofollow" class="btn-login btn btn-x-small orange btn-bordered ">登录</a>
		                 </span>
		                 @endif
		                <!-- user login info -->
		                <div id="user-nav" class="dropdown-menu user-dropdown">
		                    <div class="common-nav user-nav">
		                        <ul>
		                            <li><a href="/uc#index" title="我的主页"><i class="icon-head"></i>我的主页</a></li>
		                            <li><a href="/uc#article" title="我的文章"><i class="icon-paper"></i>我的文章</a></li>
		                            <li><a href="/uc#collect" title="我的收藏"><i class="icon-ribbon"></i>我的收藏</a></li>
		                            <li><a href="/uc#subscribe" title="我的订阅"><i class="icon-circle-plus"></i>我的订阅</a></li>
		                            <li><a href="/uc#notice" class="notifications" title="我的通知"><i class="icon-bell2"></i>我的通知</a></li>
		                            <li><a href="/uc#setting" title="账号设置"><i class="icon-cog"></i>账号设置</a></li>
		                            <li class="last"><a href="/logout" title="退出"><i class="icon-power"></i>退出</a></li>
		                        </ul>
		                    </div>
		                </div>
		                <!-- user login info end -->
		            </div>
		        </div>
		        <div class="left-c">
		            <div class="logo-part">
						<!--
		            	<a href="index.php" class="logo" title="首页">
							首页
		            	</a>
		            	-->
		            </div>
		            <nav>
		                <ul>

		                    <li class=""><a href="/" title="首页">首页</a>
		                    </li>
		                </ul>
		            </nav>
		        </div>
		    </div>
		<div class="second-nav second-nav-large">
		    <div class="inner">
		        <div class="columns fl">
	            	<div class="column-title fl">作者</div>
	            	<div class="column-second-title fl">
	                	{{$author['username']}}                            
	                </div>
		            <ul class="column-list info-list fl">
		                <li>关注（<span class="num">{{$author['followsCount']}}</span>）</li>
		                <li class="fans">粉丝（<span class="num fans-num">{{$author['followersCount']}}</span>）</li>
		            </ul>
		             @if($followed)
		             <button data-id="{{$author['id']}}" href="#" class="js-follow btn btn-small orange btn-bordered unfollow hover">
		             	<span class="txt">取消关注</span>
		             </button>
		             @else
		             <button data-id="{{$author['id']}}" href="#" class="js-follow btn btn-small orange btn-bordered follow">
		             	<span class="txt">关注</span>
		             </button>
		             @endif
	            </div>
		    </div>
		</div>
		</header>

		<!-- body -->				
<div class="m">
	<section class="wrapper" >
	  <div class="list-page user-detail" >
	    <div class="mod-user-info">
	      <div class="pic center">
	        <img src="{{$author['avatar']}}" width="100" height="100" >
	        	@if($author['is_auth'])
	                <span class="level blue-v"><i class="icon-iconfont-v"></i></span>
	            @endif
	      </div>
	      <h1 class="name">{{$author['username']}} </h1>
	      <p class="bio">{{$author['brief']}}</p>
	      <div class="info center">
	        <div class="child num-follows " data="{{ $author['id'] }}"><span class="t follow">关注</span><strong class="num">{{$author['followsCount']}}</strong></div>
	        <div class="line"> </div>
	        <div class="child num-fans data="{{ $author['id'] }}"><span class="t fans">粉丝</span><strong class="num fans-num">{{$author['followersCount']}}</strong></div>
	      </div>
	      <div class="options">
	      		@if($followed)
	            <button data-id="{{$author['id']}}" class="js-follow btn btn-normal orange btn-bordered unfollow hover">取消关注</button>
	            @else
	            <button data-id="{{$author['id']}}" class="js-follow btn btn-normal orange btn-bordered follow">关注</button>
	            @endif
	      </div>
	    </div>
	    <div class="user-article-list">
		      <div class="user-nav tc">
		        <div class="parts">
		          <a class="part @if($type == 'last') current @endif" href="/user/{{$author['id']}}/last">最新文章</a>
		          <span class="line"></span>
		          <a class="part @if($type == 'hot') current @endif" href="/user/{{$author['id']}}/hot">最热文章</a>
		        </div>
		      </div>
              <div class="mod-article-list clear">
                    <ul>
                    	@foreach($articles as $a)
                        <li>
		                  <div class="cont">
		                    <h3><a target="_blank" href="/article?id={{$a['id']}}" class="title">
		                      {{$a['title']}}</a></h3>
		                    <div class="info">
		                      <span class="author">
		                            <a  target="_blank" href="/user/{{$a['author']['id']}}/last" class="name">
		                            {{$a['author']['username'] or '已注销'}}
		                            </a>
		                                                        <span class="gap-point">•</span>
		                            {{$a['publish_time']}}                     
		                      </span>
		                    </div>
		                    <p class="intro">{{$a['abstracts']}}</p>
                            <div class="tag">
            						<i class="icon-tag2"></i>
            						@foreach($a['tagList'] as $t)
                                    <a target="_blank"  href="/tag/{{$t['id']}}/last" >{{$t['name']}}</a> 
                                    @endforeach
                            </div>
		                  </div>
		                  <div class="pic">
			                  <a target="_blank" href="/article?id={{$a['id']}}" >
			                  <img width="200" height="150" src="{{$a['face']}}">
			                  </a>
		                  </div>
		                </li>
		                @endforeach
                    </ul>
                  </div>
                  <style type="text/css" media="screen">
	                  .list-page{
	                      min-height: initial !important;
	                }
	              </style>
	          		<ul class="pagination">

	          		</ul>                    
	    </div>
	  </div>
	</section>

  
</div>

		<!-- body end -->


	</div>	


	<!-- popup -->

	<!-- 关注信息弹窗 -->
	<div id="follows-pop" class="hide pp">
		<div class="cont">
			<span class="close-btn show-detail_close"><i class="icon-cross"></i></span>
			<div class="list-page hot-list">
				<p class="h-t">{{$author['username']}}</p>
				<p class="tit-info">{{$author['followsCount']}}关注</p>
				<div class="recommend-list">
					<ul class="r-author-list">

					</ul>
					<p class="load-more hide" >
						<input type="hidden" id="follows-page" value="1">
						<button class="btn btn-normal gray btn-bordered follows-more">加载更多</button>
					</p>
				</div>
			</div>
		</div>
	</div>
	<div id="followers-pop" class="hide pp">
		<div class="cont">
			<span class="close-btn show-detail_close"><i class="icon-cross"></i></span>
			<div class="list-page hot-list">
				<p class="h-t">{{$author['username']}}</p>
				<p class="tit-info">{{$author['followersCount']}}粉丝</p>
				<div class="recommend-list">
					<ul class="r-author-list"></ul>
					<p class="load-more hide" >
						<input type="hidden" id="followers-page" value="1">
						<button class="btn btn-normal gray btn-bordered followers-more">加载更多</button>
					</p>
				</div>
			</div>
		</div>
	</div>
	@verbatim
	<script type="text/html" id="follow-li">
		{{#data}}
		<li>
			<div class="author-info clear">
				<a href="/user/{{id}}/lasted"  target="_blank" class="author-avatar fl">
					<img src="{{avatar}}" width="40" height="40" >
				</a>
				<div class="author-cont">
					<a href="/user/{{id}}/lasted"  target="_blank" class="author-name color-orange">{{username}}</a>
					<p class="pos">{{brief}}</p>
					<button class="btn btn-bordered btn-normal red {{class}} follows-btn" data="{{id}}">{{btn}}</button>
				</div>
			</div>
		</li>
		{{/data}}
	</script>
	@endverbatim
	<script type="text/javascript">
		var _ = {!! $json !!};
		var page = {{ $page }};
		var count = _.articlesCount;
	</script>
	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.js"></script>
	<script src="/usercenter/js/vendor/jquery.popupoverlay.js"></script>
	<script src="/usercenter/js/vendor/toastr.js"></script>
	<script src="/usercenter/js/vendor/mustache.js"></script>
	<script src="/front/js/nav.js"></script>
	<script src="/front/js/front.js"></script>
	<script type="text/javascript">
		$(function(){
			var html = F.mp('/user/' + _.id + '/{{$type}}', count, 10, page);
			$('.pagination').html(html);
		});
	</script>
</body>
</html>