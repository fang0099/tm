<ul>

    {{#data}}
    <li id ="">
        <div class="cont">
            <h3>
                <a target="_blank" href="{{link}}{{id}}" class="title">{{title}}</a>
            </h3>
            <div class="info">
                <span class="time">创建时间：{{publish_time}}</span>
                <span class="gap-point">•</span>
                <span class="tools">
                        <a href="article/edit?status={{type}}&id={{id}}"  class="name" style="{{style}}" >编辑</a>
                        <span class="gap-point">•</span>
                        <a href="javascript:;" data='{ "type" : "{{type}}", "id" : "{{id}}" }' class="js-delete">删除</a>
                    </span>
            </div>
        </div>
    </li>
    {{/data}}
    <!-- 待审核 -->
</ul>