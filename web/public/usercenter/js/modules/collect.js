
define(function(require, exports, modules){

    var render = require('render');
    var tplUrl = "usercenter/tpl/user-collect.tpl";
    var dataUrl = "/uc/articles/collect";
    var emptyHtml = $.ajax({
        url : "usercenter/tpl/user-empty-collect.tpl",
        async : false
    }).responseText;

    var bindArticleEvent = function () {
        var $articleLink = $('.user-articles');
        $articleLink.click(function(){
            // change style
            $articleLink.each(function(k, v){
                $(v).removeClass('current');
            });
            $(this).addClass('current');

            // to do something
            var articleTplUrl = "usercenter/tpl/user-collect-article-list.tpl";
            var url = $(this).attr('data');

            render.render(
                articleTplUrl,
                url,
                function(data){
                    return data;
                },
                function(data, html){
                    if(data.data.length > 0){
                        $('.mod-article-list').html(html);
                    }else {
                        $('.mod-article-list').html("<p class='reminder'>暂无收藏</p>");
                    }
                });
        });
    };

	exports.active = function(){
        render.renderMain(tplUrl, dataUrl, function(data){ return data}, function(){
            $('#collect-num').html(user.collectCount);
            bindArticleEvent();
            $('.first').click();
        }, emptyHtml);
	};
});