
define(function(require, exports, modules){
	
	require('mustache');
    var global = require('global');
	var base = global.base;

	var renderTplData = function (template, data, prerender, callback, emptyHtml){
        data = prerender(data);
        if(data.data instanceof Array && data.data.length == 0 && emptyHtml != ""){
            var html = emptyHtml;
        }else {
            var html = Mustache.render(template, data);
        }
        callback(data, html);
    };

	var renderTpl = function (template, dataUrl, prerender, callback, emptyHtml){
        $.getJSON(base + dataUrl, function(data){
            if(data.success){
				renderTplData(template, data, prerender, callback, emptyHtml);
            }else {
				console.log(data);
            }
        });
    };


    var render = function(tplUrl, dataUrl, prerender, callback, emptyHtml){
        $.get(tplUrl, function(tpl){
			renderTpl(tpl, dataUrl, prerender, callback, emptyHtml);
			/*
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
			 */
        });
    };

	exports.renderTplData = renderTplData;

	exports.renderTpl = renderTpl;

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