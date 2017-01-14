
<div class="m">
	    <div class="list-page my_post my_bookmark">
	        <h1>通知</h1>
	        <div class="error_msg"></div>
	        <div class="mod-article-list">
	            <ul class="bookmark-list">
                    {{#data}}
					<li id="{{id}}">
						<div class="cont" style="width: 700px;">
							<h3>{{title}}</h3>
							<div class="info"><span class="time">创建时间：{{publish_time}}</span>
								<span class="gap-point-large">•</span>
								<span class="tools">
									<a href="javascript:;" class="js-delete" data="{{id}}">删除</a>
								</span>
							</div>

						</div>
					</li>
                    {{/data}}
	            </ul>
	        </div>
	        <style type="text/css" media="screen">
	        .list-page {
	            min-height: initial !important;
	        }
	        </style>
	    </div>
</div>