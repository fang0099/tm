
define(function(require, exports, modules){
    var render = require('render');
    var tplUrl = "usercenter/tpl/user-article.tpl";
    var dataUrl = "/uc/info";

    var bindArticleEvent = function () {
		var $articleLink = $('.user-articles');
        $articleLink.click(function(){
            // change style
            $articleLink.each(function(k, v){
                $(v).removeClass('current');
            });
            $(this).addClass('current');

            // to do something
            var articleTplUrl = "usercenter/tpl/user-article-list2.tpl";
            var url = $(this).attr('data');
            render.render(articleTplUrl, url, function(data){ return data;},function(html){
                $('.mod-article-list').html(html);
            });
        });
    };
    
	exports.active = function(){
        render.renderMain(tplUrl, dataUrl, function(data){ return data}, function(){
            bindArticleEvent();
            $('.first').click();
        });
	};
});