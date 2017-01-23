<!DOCTYPE html>
<html>
<head>
	<title>{{$author['username']}}</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="/usercenter/css/style.css">
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
		                    <a title="{{ $username }}" href="javascript:void(0)" class="avatar" id="user-avatar">
		                        <img width="34" height="34" alt="{{$username}}" src="{{ $avatar }}">
		                    </a>
		                </span>
		                @else
		                <span class="unlogin">
		                    <a href="/account#login" title="登录" rel="nofollow" class="login">登录</a>
		                    <span class="line"></span>
		                    <a href="/account#reg"  title="注册" rel="nofollow" class="reg">注册</a>
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
		                <li class="fans">粉丝（<span class="num">{{$author['followersCount']}}</span>）</li>
		            </ul>
		             <button data-id="{{$author['id']}}" href="#" class="js-follow btn btn-small orange btn-bordered follow">
		             	<span class="txt">关注</span>
		             </button>
	            </div>
		    </div>
		</div>
		</header>

		<!-- body -->				
<div class="m">
	<section class="wrapper" style="min-height: 3487px;">
	  <div class="list-page user-detail" style="min-height: 3487px;">
	    <div class="mod-user-info">
	      <div class="pic center">
	        <img src="{{$author['avatar']}}" width="100" height="100" >
	                <span class="level blue-v"><i class="icon-iconfont-v"></i></span>
	            </div>
	      <h1 class="name">{{$author['username']}} </h1>
	      <p class="bio">{{$author['brief']}}</p>
	      <div class="info center">
	        <div class="child num-follows "><span class="t follow">关注</span><strong class="num">{{$author['followsCount']}}</strong></div>
	        <div class="line"> </div>
	        <div class="child num-fans "><span class="t fans">粉丝</span><strong class="num">{{$author['followersCount']}}</strong></div>
	      </div>
	      <div class="options">
	                <button data-id="{{$author['id']}}" class="btn btn-normal orange btn-bordered follow">关注</button>
	              </div>
	    </div>
	    <div class="user-article-list">
		      <div class="user-nav tc">
		        <div class="parts">
		          <a class="part current" href="/user/{{$author['id']}}/last">最新文章</a>
		          <span class="line"></span>
		          <a class="part " href="/user/{{$author['id']}}/hot">最热文章</a>
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
		                            {{$a['author']['username']}}
		                            </a>
		                                                        <span class="gap-point">•</span>
		                            {{$a['publish_time']}}                     
		                      </span>
		                    </div>
		                    <p class="intro">{{$a['abstracts']}}</p>
                            <div class="tag">
            						<i class="icon-tag2"></i>
            						@foreach($a['tagsList'] as $t)
                                    <a target="_blank"  href="/tag/{{$t['id']}}/last" title="头条">头条</a> 
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
		          		<li class="page current"><a>1</a></li>
		          		<li class="page"><a href="http://www.tmtpost.com/user/276191/2">2</a></li>
		          		<li class="page"><a href="http://www.tmtpost.com/user/276191/3">3</a></li>
		          		<li class="page"><a href="http://www.tmtpost.com/user/276191/4">4</a></li>
		          		<li class="page"><a href="http://www.tmtpost.com/user/276191/5">5</a></li>
		          		<li class="page-rl"><a href="http://www.tmtpost.com/user/276191/2">
		          		<button href="#" class="btn btn-bordered gray btn-small">下一页</button></a></li>
		          		<a href="http://www.tmtpost.com/user/276191/22"></a>
	          		</ul>                    
	    </div>
	  </div>
	</section>

  
</div>

		<!-- body end -->


	</div>	


	<!-- popup -->

	<!-- 关注信息弹窗 -->
	<div id="show-detail" class="hide pp">
		<div class="cont">
			<span class="close-btn show-detail_close"><i class="icon-cross"></i></span>
			<div class="list-page hot-list">
				<p class="h-t"></p>
				<p class="tit-info"></p>
				<div class="recommend-list">
					<div class="loading"><br><br>加载中...</div>
					<ul class="r-author-list hide"></ul>
					<p class="load-more hide" >
						<button class="btn btn-normal gray btn-bordered">加载更多</button>
					</p>
				</div>
			</div>
		</div>
	</div>

	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.js"></script>
	<script src="usercenter/js/sea.js"></script>
</body>
</html>