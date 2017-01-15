<div class="m">
	<section class="wrapper">
	    <div class="home-tags clear">
	        <h1 class="title">我订阅的话题 </h1>

	        <div class="recommend-list">
			    
			    <ul class="r-author-list hide" style="display: block;">
					{{#data}}
			        <li>
			            <div class="author-info clear">
			                <a href="/article/list?type=tag&id={{id}}" target="_blank" class="author-avatar fl">
								<img src="{{face}}" width="40" height="40" > </a>
			                <div class="author-cont">
								<a href="/article/list?type=tag&id={{id}}" target="_blank" class="author-name color-orange">
									{{name}}
								</a>
			                    <p class="pos">{{brief}}</p>
			                    <button class="btn btn-bordered btn-normal red unsubscribe" data="{{id}}">
									取消订阅
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