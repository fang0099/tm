<section class="wrapper">
  <div class="list-page user-detail">
	<div class="mod-user-info">
	  <div class="pic center">
		<img src="{{ data.avatar }}" width="100" height="100" alt="BeanHi">
			  </div>
	  <h1 class="name">{{ data.username }}</h1>
	  <p class="bio"></p>
	  <div class="info center">
		<div class="child num-follows " style="cursor: auto"><span class="t follow">关注</span>
			<strong class="num">{{ data.follow_count }}</strong>
		</div>
		<div class="line"> </div>
		<div class="child num-fans" style="cursor: auto"><span class="t fans">粉丝</span><strong class="num">{{ data.followers_count }}</strong></div>
	  </div>
	  <div class="options">
	  </div>
	</div>
	<div class="user-article-list">
	  <div class="user-nav tc">
		<div class="parts">
		  <a class="part user-index-article first" href="javascript:;" data="/uc/articles/lasted">最新文章</a>
		  <span class="line"></span>
		  <a class="part user-index-article" href="javascript:;" data="/uc/articles/hotest">最热文章</a>
		  <span class="line"></span>
		  <a class="part user-index-article" href="javascript:;" data="/uc/articles/recommend">推荐文章</a>
		</div>
	  </div>

	  <div class="mod-article-list clear">
			<ul>
				<li>
					<div class="loading" style=""><br><br>加载中...</div>
				</li>
			</ul>
		</div>

	</div>
  </div>
</section>