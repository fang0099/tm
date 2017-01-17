
define(function(require, exports, modules){
    var global = require('global');
    var render = require('render');
    var tplUrl = "usercenter/tpl/user-article.tpl";
    var dataUrl = "/uc/info";
    var draftDelUrl = "/uc/deletedraft";
    var articleDelUrl = "uc/deletearticle";

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

            render.render(
                articleTplUrl,
                url,
                function(data){
                    if(data.data){
                        for(var i = 0 ; i < data.data.length ; i++){
                            if(data.data[i].hot_num != undefined){
                                data.data[i]['type'] = 'article';
                                data.data[i]['link'] = '/article?id=';
                            }else {
                                data.data[i]['type'] = 'draft';
                                data.data[i]['style'] = "color:#21B890;font-weight: bold"
                                data.data[i]['link'] = '/article/edit?status=draft&id=';
                            }
                        }
                    }
                    return data;
                },
                function(data, html){
                    if(data.data.length > 0){
                        $('.mod-article-list').html(html);
                    }else {
                        if(url == '/uc/articles/draft'){
                            $('.mod-article-list').html("<p class='reminder'>暂无草稿</p>");
                        }else if(url == '/uc/articles/checking'){
                            $('.mod-article-list').html("<p class='reminder'>暂无待审核的文章</p>");
                        }else if(url == '/uc/articles/lasted'){
                            $('.mod-article-list').html("<p class='reminder'>暂无已发布的文章</p>");
                        }else if(url == '/uc/articles/reject'){
                            $('.mod-article-list').html("<p class='reminder'>暂无被拒的文章</p>");
                        }

                    }

                    // bind event
                    $('.js-delete').click(function(){
                        var data = $(this).attr('data');
                        data = global.getJson(data);
                        var url = '';
                        if(data.type == 'draft'){
                            url = draftDelUrl + '/' + data.id;
                        }else if(data.type == 'article'){
                            url = articleDelUrl + '/' + data.id;
                        }
                        $.getJSON(url, function(data){
                            if(data.success){
                                $('.post-nav').find('a.current').click();
                            }else {
                                global.reminder({message : data['message']});
                            }
                        });
                    });

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