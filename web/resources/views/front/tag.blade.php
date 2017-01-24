<!DOCTYPE html>
<html>
<head>
	<title>{{$tag['name']}}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="/usercenter/css/style.css">
	<link rel="stylesheet" type="text/css" href="/usercenter/css/responsive.css">
	<link rel="stylesheet" href="/zhuanlan/css/icomoon.css">
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
	            	<div class="column-title fl">标签</div>
	            	<div class="column-second-title fl">
	                	{{$tag['name']}}                            
	                </div>
		            <ul class="column-list info-list fl">
		                <li class="fans">粉丝（<span class="num">{{$tag['subscriberCount']}}</span>）</li>
		            </ul>
		             <button data-id="{{$tag['id']}}" href="#" class="js-follow btn btn-small orange btn-bordered follow">
		             	<span class="txt">关注</span>
		             </button>
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
	        <img src="{{$tag['face']}}" width="100" height="100" >
	      </div>
	      <h1 class="name">{{$tag['name']}} </h1>
	      <p class="bio">{{$tag['brief']}}</p>
	      <div id="number_of_followers"><span class="num">{{$tag['subscriberCount']}}</span>&ensp;粉丝</div>
	      <div class="options">
	                <button data-id="{{$tag['id']}}" class="btn btn-normal orange btn-bordered follow">关注</button>
	      </div>
	    </div>
	    <div class="user-article-list">
		      <div class="user-nav tc">
		        <div class="parts">
		          <a class="part @if($type == 'last') current @endif" href="/tag/{{$tag['id']}}/last">最新文章</a>
		          <span class="line"></span>
		          <a class="part @if($type == 'hot') current @endif" href="/tag/{{$tag['id']}}/hot">最热文章</a>
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


	
	<script type="text/javascript">
		var _ = {!! $json !!};
		var page = {{ $page }};
		var count = _.articleCount;
	</script>
	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.js"></script>
	<script src="/front/js/nav.js"></script>
	<script src="/front/js/front.js"></script>
	<script type="text/javascript">
		$(function(){
			var html = F.mp('/tag/' + _.id + '/{{$type}}', count, 10, page);
			$('.pagination').html(html);
		});
	</script>
</body>
</html>