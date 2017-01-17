
define(function(require, exports, modules){

    var render = require('render');
    var tplUrl = "usercenter/tpl/user-collect.tpl";
    var dataUrl = "/uc/articles/collect";
    var emptyHtml = $.ajax({
        url : "usercenter/tpl/user-empty-collect.tpl",
        async : false
    }).responseText;

	exports.active = function(){
        render.renderMain(tplUrl, dataUrl, function(data){ return data}, function(){
            $('#collect-num').html(user.collectCount);
        }, emptyHtml);
	};
});