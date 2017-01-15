
define(function(require, exports, modules){
	
	require('mustache');
    var global = require('global');
	var base = global.base;

	var render = function(tplUrl, dataUrl, prerender, callback, emptyHtml){
        $.get(tplUrl, function(tpl){
        	$.getJSON(base + dataUrl, function(data){
				if(data.success){
					data = prerender(data);
					if(data.data instanceof Array && data.data.length == 0 && emptyHtml != ""){
						var html = emptyHtml;
					}else {
                        var html = Mustache.render(tpl, data);
					}
                    callback(data, html);
				}else {

				}
			});

        });
	};

	exports.render = render;

	exports.renderMain = function(tplUrl, dataUrl, prerender, callback, emptyHtml){
		$main = $('#main-body');
		// todo add loading
		render(tplUrl, dataUrl, prerender, function(data, html){
			$main.html(html);
			callback(data, html);
		}, emptyHtml);
	}

});