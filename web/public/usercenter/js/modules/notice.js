
define(function(require, exports, modules){

    var render = require('render');
    var tplUrl = "usercenter/tpl/user-notice.tpl";
    var dataUrl = "/uc/notices";

    exports.active = function(){
        render.renderMain(tplUrl, dataUrl, function(data){ return data}, function(){
        });
    };
});