
define(function(require, exports, modules){

    var render = require('render');
    var tplUrl = "usercenter/tpl/user-notice.tpl";
    var dataUrl = "/uc/notices";
    var emptyHtml = $.ajax({
        url : "usercenter/tpl/user-empty-notice.tpl",
        async : false
    }).responseText;

    exports.active = function(){
        render.renderMain(tplUrl, dataUrl, function(data){ return data}, function(){
        }, emptyHtml);
    };
});