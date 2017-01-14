
define(function(require, exports, modules){

    var render = require('render');
    var tplUrl = "usercenter/tpl/user-collect.tpl";
    var dataUrl = "/uc/articles/collect";

	exports.active = function(){
        render.renderMain(tplUrl, dataUrl, function(data){ return data}, function(){
        });
	};
});