
define(function(require, exports, modules){
	
	require('mustache');
    var global = require('global');
	var base = global.base;

	var render = function(tplUrl, dataUrl, prerender, callback){
        $.get(tplUrl, function(tpl){
        	$.getJSON(base + dataUrl, function(data){
				if(data.success){
					data = prerender(data);
					var html = Mustache.render(tpl, data);
                    callback(html);
				}else {

				}
			});

        });
	};

	exports.render = render;

	exports.renderMain = function(tplUrl, dataUrl, prerender, callback){
		$main = $('#main-body');
		// todo add loading
		render(tplUrl, dataUrl, prerender, function(html){
			$main.html(html);
			callback();
		});
	}

});