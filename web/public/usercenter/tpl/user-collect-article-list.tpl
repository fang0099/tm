<ul class="bookmark-list">
    {{#data}}
    <li id="">
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