<div class="m">
	    <div class="list-page my_post my_bookmark">
	        <h1>我的收藏(<span id='collect-num'></span>)</h1>
	        <div class="error_msg"></div>
	        <div class="mod-article-list">
	            <ul class="bookmark-list">
					{{#data}}
	                <li id="2558800">
	                    <div class="cont" style="width: 700px;">
	                        <h3><a href="/article?id={{id}}" class="title" >{{title}}</a></h3>
	                        <div class="info"><span class="time">创建时间：{{publish_time}}</span>
								<!--
								<span class="gap-point-large">•</span>
								<span class="tools">
									<a href="javascript:;" class="js-delete" data="{{id}}">取消收藏</a>
								</span>
								-->
							</div>

	                    </div>
	                </li>
					{{/data}}
	            </ul>
	        </div>
	        <!--         <p class="load-more">
			          		<button class="btn btn-normal gray btn-bordered">更多文章</button>
			       		 </p> -->
	        <style type="text/css" media="screen">
	        .list-page {
	            min-height: initial !important;
	        }
	        </style>
	    </div>
</div>