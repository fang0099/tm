<div class="m">
	<section class="wrapper">
	    <div class="home-tags clear">
	        <h1 class="title">我关注的人 </h1>

	        <div class="recommend-list">
			    
			    <ul class="r-author-list hide" style="display: block;">
					{{#data}}
			        <li>
			            <div class="author-info clear">
			                <a href="/article/list?id={{id}}" target="_blank" class="author-avatar fl">
								<img src="{{avatar}}" width="40" height="40" > </a>
			                <div class="author-cont">
								<a href="/article/list?id={{id}}" target="_blank" class="author-name color-orange">
									{{username}}
								</a>
			                    <p class="pos">{{brief}}</p>
			                    <button class="btn btn-bordered btn-normal red unfollow" data="{{id}}">
									取消关注
								</button>
			                </div>
			            </div>
			        </li>
					{{/data}}
			    </ul>
			    <p class="load-more hide follow">
			        <button class="btn btn-normal gray btn-bordered">加载更多</button>
			    </p>
			</div>

	    </div>

	</section>
</div>