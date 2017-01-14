
define(function(require, exports, modules){
	var render = require('render');
    var tplUrl = "usercenter/tpl/user-activity.tpl";
    var dataUrl = "/uc/activities";


	exports.active = function(){
        render.renderMain(tplUrl, dataUrl, function(data){
			return data;
		},function(){
        });
	};
});