
define(function(require, exports, modules){
	
	var render = require('render');
	var tplUrl = "usercenter/tpl/user-info.tpl";
	var dataUrl = "/uc/info";
	var $main = $('#main-body');
	
	var bindUserInfoEvent = function () {
		/*
		$('.num-follows').click(function(){
			$('#show-detail').removeClass('hide');
			$('#show-detail').popup('show');
			// get data

		});
		*/
    };
	
	var bindArticleEvent = function(){
		var $articleLink = $('.user-index-article');
		$articleLink.click(function(){
			// change style
			$articleLink.each(function(k, v){
				$(v).removeClass('current');
			});
			$(this).addClass('current');

			// to do something
			var articleTplUrl = "usercenter/tpl/user-article-list.tpl";
			var url = $(this).attr('data');
			render.render(articleTplUrl,
							url,
							function(data){ return data;},
							function(data, html){
								var $wrap = $('.mod-article-list');
								$wrap.html(html);
							},
							''
			);
		});
	};

	exports.active = function(){
		render.renderMain(tplUrl, dataUrl, function(data){ return data}, function(){
            bindUserInfoEvent();
            bindArticleEvent();
            $('.first').click();
		}, '');
	};
});