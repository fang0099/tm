<ul>
    {{#data}}
	<li>
		<div class="cont">
            <h3>
                <a target="_blank" href="/article?id={{id}}" title="{{ title }}" class="title">
                {{title}}
                </a>
            </h3>
            <div class="info">
              <span class="author">
                  <a title="{{author.username}}" target="_blank" href="#" class="name">
                        {{author.username}}
                  </a>
                  <span class="gap-point">•</span>
                    {{publish_time}}
              </span>
            </div>
        	<p class="intro">{{abstracts}}</p>
            <div class="tag">
				<i class="icon-tag2"></i>
                {{#tagList}}
                <a target="_blank" href="/article/list?type=tag&id={{id}}" title="{{name}}">{{name}}</a> 
                {{/tagList}}
            </div>
        </div>
		<div class="pic"><a target="_blank" href="/article?id={{id}}" title="{{title}}"><img width="200" height="150" alt="{{title}}" src="{{face}}"></a></div>
	</li>
    {{/data}}
</ul>