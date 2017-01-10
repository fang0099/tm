<!DOCTYPE html>
<html>
<head>
	<title>User Center</title>
	<meta charset="utf-8">
	<base href="/tm/web/public/">
	<link rel="stylesheet" type="text/css" href="uc/css/app.usercenter.css" />
</head>
<body>
	
	<div class='main-body'>
		<div class='app-header'>
			<div class='app-header-inner'>
				<a href=''></a>
				<nav role="navigation" class="app-header-nav">
					<a class="app-header-navItem" href="/">首页</a>
					<!--
					<a class="app-header-navItem" href="/explore">发现</a>
					<a class="app-header-navItem" href="/topic">话题</a>
					-->
				</nav>
				<div class='app-header-userInfo'>
					<!-- notice notify -->
					<div class="Popover PushNotifications app-header-notifications">
						<button class="Button PushNotifications-icon Button--plain svg" type="button" ref-template="svg-notice">
						
						</button><!-- react-empty: 252 -->
					</div>
					
					<!-- user profile -->
					<div class="app-header-profile">
						<div class="Popover">
							<button class="Button app-header-profileEntry Button--plain" type="button">
								<!--
								<img class="Avatar" src="https://pic3.zhimg.com/v2-57fafa7b4bb0e946ccff2eaee1e59a06_is.jpg" srcset="https://pic3.zhimg.com/v2-57fafa7b4bb0e946ccff2eaee1e59a06_im.jpg 2x" style="width: 30px; height: 30px;">
								-->
								<img class="Avatar" src="{{ $avatar }}"  style="width: 30px; height: 30px;">
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='app-main'>
			<div class="profile-main">
				<div class="profile-mainColumn">
					<div class="Card ProfileMain">
						<div class="ProfileMain-header">
							<ul role="tablist" class="Tabs ProfileMain-tabs tab-list">
								<li role="tab" class="Tabs-item Tabs-item--noMeta">
									<a class="Tabs-link" href='javascript:;' data='{"header" : "activity-head"}'>动态</a>
								</li>
								<li role="tab" class="Tabs-item Tabs-item--noMeta">
									<a class="Tabs-link" href='javascript:;' data='{"header" : "notice-head"}'>通知</a>
								</li>
								<li role="tab" class="Tabs-item Tabs-item--noMeta">
									<a class="Tabs-link" href='javascript:;' data='{"header" : "article-head"}'>文章</a>
								</li>	
								<li role="tab" class="Tabs-item Tabs-item--noMeta">
									<a class="Tabs-link" href='javascript:;' data='{"header" : "collect-head"}'>收藏</a>
								</li>
								<li role="tab" class="Tabs-item Tabs-item--noMeta">
									<a class="Tabs-link" href='javascript:;' data='{"header" : "subscribe-head"}'>订阅</a>
								</li>
								<li role="tab" class="Tabs-item Tabs-item--noMeta">
									<a class="Tabs-link" href='javascript:;' data='{"header" : "follow-head"}'>关注</a>
								</li>
								<li role="tab" class="Tabs-item Tabs-item--noMeta">
									<a class="Tabs-link" href='javascript:;' data='{"header" : "set-head"}'>设置</a>
								</li>	
								
							</ul>
						</div>

						<div class="PageHeader">
						<!-- page header sticky on top -->
					</div>
					<div class="main-list List">
						<div class="list-header" id='list-header'>
							<!-- header -->
						</div>
						<div class="list-body ">
							<div class="activity" id='list-body-content'>
								<div class="EmptyState">
									<div class="EmptyState-inner">
										<svg width="78px" height="69px" viewBox="0 0 78 69" class="EmptyState-image"><title/><g><defs>         <path d="M72,19.4619408 L72,56.0017404 C72,59.3144877 69.3089213,62 66.0005656,62 L45.4558441,62 L38.6021577,68.8536865 C37.4330392,70.022805 35.5411188,70.0264001 34.3684051,68.8536865 L27.5147186,62 L5.99943435,62 C2.68603825,62 0,59.3221316 0,56.0017404 L0,13.9982596 C0,10.6855123 2.69107868,8 5.99943435,8 L59.4203102,8" id="path-1"/>         <mask id="mask-2" maskContentUnits="userSpaceOnUse" maskUnits="objectBoundingBox" x="0" y="0" width="72" height="61.731874" fill="white">             <use xlink:href="#path-1"/>         </mask>         <path d="M-2.77111667e-13,30 L-2.62900812e-13,3.24499911 C-2.62995526e-13,1.58684234 1.3486445,0.242640687 3.00032973,0.242640687 L6.99967027,0.242640687 C8.65670662,0.242640687 10,1.58595312 10,3.24499911 L10,30" id="path-3"/>         <mask id="mask-4" maskContentUnits="userSpaceOnUse" maskUnits="objectBoundingBox" x="0" y="0" width="10" height="29.7573593" fill="white">             <use xlink:href="#path-3"/>         </mask>     </defs>     <g id="空状态" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">         <g id="answer" transform="translate(-39.000000, -25.000000)">             <g id="Answer" transform="translate(39.000000, 24.000000)">                 <use id="Combined-Shape" stroke="#EBEEF5" mask="url(#mask-2)" stroke-width="6" xlink:href="#path-1"/>                 <rect id="Rectangle-17" fill="#F8F9FA" x="16" y="23" width="30" height="3" rx="1.5"/>                 <rect id="Rectangle-17-Copy" fill="#F8F9FA" x="16" y="34" width="40" height="3" rx="1.5"/>                 <rect id="Rectangle-17-Copy-2" fill="#F8F9FA" x="16" y="45" width="40" height="3" rx="1.5"/>                 <g id="pen" transform="translate(62.232233, 17.267767) rotate(45.000000) translate(-62.232233, -17.267767) translate(57.232233, -1.732233)">                     <use id="Rectangle-18-Copy" stroke="#EBEEF5" mask="url(#mask-4)" stroke-width="6" xlink:href="#path-3"/>                     <path d="M3.59391533,31.0939734 C4.37047445,29.6318348 5.63325346,29.6388538 6.40608467,31.0939734 L10,37.8607507 L2.84217094e-14,37.8607507 L3.59391533,31.0939734 Z" id="Triangle" fill="#EBEEF5" transform="translate(5.000000, 33.930375) scale(1, -1) translate(-5.000000, -33.930375) "/>
															</g>             </g>         </g>     </g></g>
										</svg>
										<span>
									还没有内容
								</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					</div>
				</div>
				<div class="Profile-sideColumn">
					<div class="Card FollowshipCard">
						<div class="NumberBoard FollowshipCard-counts">
							<a class="Button NumberBoard-item Button--plain" type="button" href="javascript:;">
								<div class="NumberBoard-name">关注了</div>
								<div class="NumberBoard-value">{{ $follow_count }}</div>
							</a>
							<div class="NumberBoard-divider"></div>
							<a class="Button NumberBoard-item Button--plain" type="button" href="javascript:;">
								<div class="NumberBoard-name">关注者</div>
								<div class="NumberBoard-value">{{ $followers_count }}</div>
							</a>
						</div>
					</div>
					<div class="Profile-lightList">
						<a class="Profile-lightItem" href="javascript:;">
							<span class="Profile-lightItemName">订阅的标签</span>
							<span class="Profile-lightItemValue">{{ $tagCount }}</span>
						</a>
						<a class="Profile-lightItem" href="javascript:;">
							<span class="Profile-lightItemName">关注的人</span>
							<span class="Profile-lightItemValue">{{ $follow_count }}</span>
						</a>
						<a class="Profile-lightItem" href="javascript:;">
							<span class="Profile-lightItemName">收藏的文章</span>
							<span class="Profile-lightItemValue">{{ $collectCount }}</span>
						</a>
						<a class="Profile-lightItem" href="javascript:;">
							<span class="Profile-lightItemName">我的文章</span>
							<span class="Profile-lightItemValue">{{ $articlesCount }}</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>



	@verbatim
	<!-- list header template begin -->
	<script type="text/html" id="activity-head">
		<div class="List-headerText">
			<h4 class="List-headerText">
				<div class="SubTabs">
					<a class="SubTabs-item is-active" data="/uc/activities"  page="1">我的动态</a>
				</div>
			</h4>
		</div>
	</script>
	<script type="text/html" id="notice-head">
		<div class="List-headerText">
			<h4 class="List-headerText">
				<div class="SubTabs">
					<a class="SubTabs-item is-active" data="/uc/notices"  page="1">我的通知</a>
				</div>
			</h4>
		</div>
	</script>
	<script type="text/html" id="article-head">
		<div class="List-headerText">
			<h4 class="List-headerText">
				<div class="SubTabs">
					<a class="SubTabs-item is-active" data="/uc/articles/lasted"  page="1">最新</a>
					<a class="SubTabs-item" data="/uc/articles/hotest"  page="1">最热</a>
					<a class="SubTabs-item" data="/uc/articles/recommend"  page="1">推荐</a>
					<a class="SubTabs-item" data="/uc/articles/draft"  page="1">草稿箱</a>
				</div>
			</h4>
		</div>
	</script>
	<script type="text/html" id="collect-head">
		<div class="List-headerText">
			<h4 class="List-headerText">
				<div class="SubTabs">
					<a class="SubTabs-item is-active" data="/uc/articles/collect"  page="1">我的收藏</a>
				</div>
			</h4>
		</div>
	</script>
	<script type="text/html" id="subscribe-head">
		<div class="List-headerText">
			<h4 class="List-headerText">
				<div class="SubTabs">
					<a class="SubTabs-item is-active" data="/uc/subscribe"  page="1">我的订阅</a>
					<a class="SubTabs-item" data="/uc/articles/tags"  page="1">订阅标签文章</a>
				</div>
			</h4>
		</div>
	</script>
	<script type="text/html" id="follow-head">
		<div class="List-headerText">
			<h4 class="List-headerText">
				<div class="SubTabs">
					<a class="SubTabs-item is-active" data="/uc/follows"  page="1">关注了</a>
					<a class="SubTabs-item" data="/uc/followers"  page="1">关注者</a>
					<a class="SubTabs-item" data="/uc/articles/followers"  page="1">关注人的文章</a>
				</div>
			</h4>
		</div>
	</script>
	<script type="text/html" id="set-head">
		<div class="List-headerText">
			<h4 class="List-headerText">
				<div class="SubTabs">
					<a class="SubTabs-item is-active" data="/uc/info">编辑资料</a>
				</div>
			</h4>
		</div>
	</script>
	<!-- list header template end -->

	<script type="text/html" id="empty">
		<div class="EmptyState">
		<div class="EmptyState-inner">
								<svg width="78px" height="69px" viewBox="0 0 78 69" class="EmptyState-image"><title/><g><defs>         <path d="M72,19.4619408 L72,56.0017404 C72,59.3144877 69.3089213,62 66.0005656,62 L45.4558441,62 L38.6021577,68.8536865 C37.4330392,70.022805 35.5411188,70.0264001 34.3684051,68.8536865 L27.5147186,62 L5.99943435,62 C2.68603825,62 0,59.3221316 0,56.0017404 L0,13.9982596 C0,10.6855123 2.69107868,8 5.99943435,8 L59.4203102,8" id="path-1"/>         <mask id="mask-2" maskContentUnits="userSpaceOnUse" maskUnits="objectBoundingBox" x="0" y="0" width="72" height="61.731874" fill="white">             <use xlink:href="#path-1"/>         </mask>         <path d="M-2.77111667e-13,30 L-2.62900812e-13,3.24499911 C-2.62995526e-13,1.58684234 1.3486445,0.242640687 3.00032973,0.242640687 L6.99967027,0.242640687 C8.65670662,0.242640687 10,1.58595312 10,3.24499911 L10,30" id="path-3"/>         <mask id="mask-4" maskContentUnits="userSpaceOnUse" maskUnits="objectBoundingBox" x="0" y="0" width="10" height="29.7573593" fill="white">             <use xlink:href="#path-3"/>         </mask>     </defs>     <g id="空状态" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">         <g id="answer" transform="translate(-39.000000, -25.000000)">             <g id="Answer" transform="translate(39.000000, 24.000000)">                 <use id="Combined-Shape" stroke="#EBEEF5" mask="url(#mask-2)" stroke-width="6" xlink:href="#path-1"/>                 <rect id="Rectangle-17" fill="#F8F9FA" x="16" y="23" width="30" height="3" rx="1.5"/>                 <rect id="Rectangle-17-Copy" fill="#F8F9FA" x="16" y="34" width="40" height="3" rx="1.5"/>                 <rect id="Rectangle-17-Copy-2" fill="#F8F9FA" x="16" y="45" width="40" height="3" rx="1.5"/>                 <g id="pen" transform="translate(62.232233, 17.267767) rotate(45.000000) translate(-62.232233, -17.267767) translate(57.232233, -1.732233)">                     <use id="Rectangle-18-Copy" stroke="#EBEEF5" mask="url(#mask-4)" stroke-width="6" xlink:href="#path-3"/>                     <path d="M3.59391533,31.0939734 C4.37047445,29.6318348 5.63325346,29.6388538 6.40608467,31.0939734 L10,37.8607507 L2.84217094e-14,37.8607507 L3.59391533,31.0939734 Z" id="Triangle" fill="#EBEEF5" transform="translate(5.000000, 33.930375) scale(1, -1) translate(-5.000000, -33.930375) "/>                 
								</g>             </g>         </g>     </g></g>
								</svg>
								<span>
									还没有内容
								</span>
		</div>
		</div>
	</script>
	<script type="text/html" id="list-content">
		<div class="List-item">
			<div class="List-itemMeta">
				<div class="ActivityItem-meta">
					<span class="ActivityItem-metaTitle">{{ title }}</span>
					<span>{{ publish_time }}</span>
				</div>
			</div>	
			<div class="ContentItem">
				<h2 class="ContentItem-title"><a href="/article?id={{ ref.id }}" target="_blank">{{ ref.title }}</a></h2>
			</div>
		</div>
	</script>
	<script type="text/html" id="list-portrait">
		<div class="List-item">
			<div class="List-itemMeta">
				<div class="ActivityItem-meta">
					<span class="ActivityItem-metaTitle">{{ title }}</span>
					<span>{{ publish_time }}</span>
				</div>
			</div>	
			<div class="PortraitItem">
				<a class="TopicLink PortraitItem-image">
					<div class="Popover">
						<div id="Popover-44751-46196-toggle">
							<img class="Avatar Avatar--large TopicLink-avatar" src="{{ ref.face }}" style="width: 60px; height: 60px;" />
						</div>
					</div>
				</a>
				<div class="ContentItem PortraitItem-content">
					<h2 class="ContentItem-title">
						<a class="TopicLink" href="/article/list?type=tag&id={{ ref.id }}" target="_blank">
							<div class="Popover">
								<div id="Popover-44757-14117-toggle" >{{ ref.name }}</div>
							</div>
						</a>
					</h2>
					<div class="ContentItem-meta"><div class="TopicItem-meta">{{ ref.brief }}</div></div>
				</div>
			</div>
		</div>
	</script>
	<script type="text/html" id="list-tags">
		<div class="List-item">
			<div class="PortraitItem">
				<a class="TopicLink PortraitItem-image">
					<div class="Popover">
						<div id="Popover-44751-46196-toggle">
							<img class="Avatar Avatar--large TopicLink-avatar" src="{{ face }}" style="width: 60px; height: 60px;" />
						</div>
					</div>
				</a>
				<div class="ContentItem PortraitItem-content">
					<h2 class="ContentItem-title">
						<a class="TopicLink" href="/article/list?type=tag&id={{ id }}" target="_blank">
							<div class="Popover">
								<div id="Popover-44757-14117-toggle" >{{ name }}</div>
							</div>
						</a>
					</h2>
					<div class="ContentItem-meta"><div class="TopicItem-meta">{{ brief }}</div></div>
				</div>
			</div>
		</div>
	</script>
	<script type="text/html" id="list-user">
		<div class="List-item">
			<div class="List-itemMeta">
				<div class="ActivityItem-meta">
					<span class="ActivityItem-metaTitle">{{ title }}</span>
					<span>{{ publish_time }}</span>
				</div>
			</div>
			<div class="PortraitItem">
				<a class="TopicLink PortraitItem-image">
					<div class="Popover">
						<div id="Popover-44751-46196-toggle">
							<img class="Avatar Avatar--large TopicLink-avatar" src="{{ ref.avatar }}" style="width: 60px; height: 60px;" />
						</div>
					</div>
				</a>
				<div class="ContentItem PortraitItem-content">
					<h2 class="ContentItem-title">
						<a class="TopicLink" href="/article/list?id={{ ref.id }}" target="_blank">
							<div class="Popover">
								<div id="Popover-44757-14117-toggle" >{{ ref.username }}</div>
							</div>
						</a>
					</h2>
					<div class="ContentItem-meta"><div class="TopicItem-meta">{{ ref.brief }}</div></div>
				</div>
			</div>
		</div>
	</script>
	<script type="text/html" id="list-notice">
		<div class="List-item">
			<div class="ContentItem">
				<h2 class="ContentItem-title">
					<div class="QuestionItem-title">
						{{ title }}
					</div>
				</h2>
			</div>
			<div class="ContentItem-status"><span class="ContentItem-statusItem">{{ publish_time }}</span></div>
		</div>
	</script>
	<script type="text/html" id="svg-notice">
		<svg viewBox="0 0 20 22" class="Icon Icon--news" width="20" height="20" aria-hidden="true" style="height: 20px; width: 20px;"><title/>
						<g><path d="M2.502 14.08C3.1 10.64 2 3 8.202 1.62 8.307.697 9.08 0 10 0s1.694.697 1.797 1.62C18 3 16.903 10.64 17.497 14.076c.106 1.102.736 1.855 1.7 2.108.527.142.868.66.793 1.206-.075.546-.542.95-1.09.943H1.1C.55 18.34.084 17.936.01 17.39c-.075-.547.266-1.064.794-1.206.963-.253 1.698-1.137 1.698-2.104zM10 22c-1.417.003-2.602-1.086-2.73-2.51-.004-.062.02-.124.063-.17.043-.045.104-.07.166-.07h5c.063 0 .124.025.167.07.044.046.067.108.063.17-.128 1.424-1.313 2.513-2.73 2.51z"/></g>
		</svg>
	</script>
	@endverbatim
	<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://www.bootcss.com/p/underscore/underscore-min.js"></script>
	<script type="text/javascript" src="uc/js/beta.js"></script>
	<script type="text/javascript" src="uc/js/beta-utils-base.js"></script>
	<script type="text/javascript" src="uc/js/beta-utils-te.js"></script>
	<script type="text/javascript" src="uc/js/service/beta-service-init-svg.js"></script>
	<script type="text/javascript" src="uc/js/service/beta-service-tab.js"></script>
</body>
</html>