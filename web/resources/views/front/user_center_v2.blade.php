<!DOCTYPE html>
<html>
<head>
	<title>User Center</title>
	<meta charset="utf-8">

	<!--
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
	-->
	<link rel="stylesheet" type="text/css" href="usercenter/css/style.css">
	<!--
	<link rel="stylesheet" type="text/css" href="usercenter/css/fonts.css">
	-->
</head>
<body>

	<div class="container">
		<header class="p-header new-header p-header-show">
		    <div class="first-nav">
		        <div class="options">
		        	<!--
		            <div class="nav-search">
		                <form action="/search" method="get" accept-charset="utf-8">
		                    <input type="text" name="q" value="">
		                    <button class="search"><i class="icon-search"></i></button>
		                </form>
		            </div>
		            -->
		            <a href="/article/edit" class="btn btn-x-small orange post-edit">写稿</a>
		            <div class="dropdown-menu-part">
		                <span class="setting">
		                    <a title="{{ $username }}" href="javascript:void(0)" class="avatar" id="user-avatar">
		                        <img width="34" height="34" alt="{{$username}}" src="{{ $avatar }}">
		                    </a>
		                </span>
		                <!-- user login info -->
		                <div id="user-nav" class="dropdown-menu user-dropdown">
		                    <div class="common-nav user-nav">
		                        <ul>
		                            <li><a href="index.php/uc#index" title="我的主页"><i class="icon-head"></i>我的主页</a></li>
		                            <li><a href="index.php/uc#article" title="我的文章"><i class="icon-paper"></i>我的文章</a></li>
		                            <li><a href="index.php/uc#collect" title="我的收藏"><i class="icon-ribbon"></i>我的收藏</a></li>
		                            <li><a href="index.php/uc#subscribe" title="我的订阅"><i class="icon-circle-plus"></i>我的订阅</a></li>
		                            <li><a href="index.php/uc#notice" class="notifications" title="我的通知"><i class="icon-bell2"></i>我的通知</a></li>
		                            <li><a href="index.php/uc#setting" title="账号设置"><i class="icon-cog"></i>账号设置</a></li>
		                            <li class="last"><a href="/account/logout" title="退出"><i class="icon-power"></i>退出</a></li>
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

		                    <li class=""><a href="index.php" title="首页">首页</a>
		                    </li>
							<!--
		                    <li class=""><a href="/trendmakers" title="我造社区">我造社区</a></li>
		                    <li class=""><a href="/events" title="活动">活动</a></li>
		                    <li class=""><a href="/pro/index" title="专业版">专业版</a></li>
		                    -->
		                </ul>
		            </nav>
		        </div>
		    </div>
		<div class="second-nav second-nav-large">
		    <div class="inner">
		        <div class="columns fl">
		            <ul class="column-list nav-list fl">
		                <li>
		                	<a class="second-link index-first" href="/uc#index" title="主页">主页<span class="avia-menu-fx"><span class="avia-arrow-wrap"><span class="avia-arrow"></span></span></span>
		                	</a>
		                </li>
		                <li>
		                	<a class="second-link " href="/uc#activity" title="动态">动态<span class="avia-menu-fx"><span class="avia-arrow-wrap"><span class="avia-arrow"></span></span></span>
		                	</a>
		                </li>
		                <li>
		                	<a class="second-link " href="/uc#article" title="文章">文章<span class="avia-menu-fx"><span class="avia-arrow-wrap"><span class="avia-arrow"></span></span></span>
		                	</a>
		                </li>
		                
		                <li>
		                	<a class="second-link " href="/uc#collect" title="收藏">收藏<span class="avia-menu-fx"><span class="avia-arrow-wrap"><span class="avia-arrow"></span></span></span>
		                	</a>
		                </li>
		                <li>
		                	<a class="second-link " href="/uc#subscribe" title="订阅">订阅<span class="avia-menu-fx"><span class="avia-arrow-wrap"><span class="avia-arrow"></span></span></span>
		                	</a>
		                </li>
		                <li>
		                	<a class="second-link " href="/uc#follow" title="关注">关注<span class="avia-menu-fx"><span class="avia-arrow-wrap"><span class="avia-arrow"></span></span></span>
		                	</a>
		                </li>
		                <li>
		                	<a class="second-link " href="/uc#notice" title="通知">通知<span class="avia-menu-fx"><span class="avia-arrow-wrap"><span class="avia-arrow"></span></span></span>
		                	</a>
		                </li>
		                
		                <li>
		                	<a class="second-link " href="/uc#setting" title="设置">设置<span class="avia-menu-fx"><span class="avia-arrow-wrap"><span class="avia-arrow"></span></span></span>
		                	</a>
		                </li>
		                
		            </ul>
		        </div>
		    </div>
		</div>
		</header>

		<!-- body -->
		<div id="main-body">
				
				

		</div>

		<!-- body end -->


	</div>	


	<!-- popup -->

	 <div id="delete_post_popup" class="hide pp">
      <div class="cont tc">
        <span class="close-btn delete_post_popup_close"><i class="icon-cross"></i></span>
                              <h3 class ="title">确定要删除该草稿吗？</h3>
                      <!-- <h3 class ="title">确定要删除该文章吗？</h3> -->
        <p class="reminder"></p>
        <div class="buttons">
            <button class="delete_post_popup_close btn btn-normal gray btn-bordered">取消</button>
            <button class="delete_post_popup_close btn btn-normal orange btn-bordered confirm">确定</button>
        </div>
      </div>
    </div>
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

	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	<script src="usercenter/js/sea.js"></script>
	<script src="usercenter/js/beta-usercenter-init.js"></script>

</body>
</html>