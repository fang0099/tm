
define(function(require, exports, modules){

    var render = require('render');
    var global = require('global');
    var tplUrl = "usercenter/tpl/user-subscribe-tag.tpl";
    var dataUrl = "/uc/subscribe";
    var unfollowUrl = "/uc/unsubscribe"

    var bindUnSubscribeEvent = function () {
        $('.unsubscribe').click(function(){
            var id = $(this).attr('data');
            console.log(id);
            $.ajax({
                url : global.base + unfollowUrl + "/" + id,
                dataType : 'json',
                type : 'post',
                success : function (data) {
                    if(data.success){
                        render.renderMain(tplUrl, dataUrl, function(data){ return data}, function(){
                            bindUnSubscribeEvent();
                        });
                    }else {
                        global.reminder({message : data.message});
                    }
                }
            });
        });
    };
    
    exports.active = function(){
        render.renderMain(tplUrl, dataUrl, function(data){ return data}, function(){
            bindUnSubscribeEvent();
        });
    };
});