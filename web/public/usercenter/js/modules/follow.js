
define(function(require, exports, modules){

    var render = require('render');
    var global = require('global');
    var tplUrl = "usercenter/tpl/user-followers.tpl";
    var dataUrl = "/uc/follows";
    var unfollowUrl = "/uc/unfollow";

    var emptyHtml = $.ajax({
        url : "usercenter/tpl/user-empty-followers.tpl",
        async : false
    }).responseText;

    var bindUnfollowEvent = function () {
        $('.unfollow').click(function(){
            var id = $(this).attr('data');
            console.log(id);
            $.ajax({
                url : global.base + unfollowUrl + "/" + id,
                dataType : 'json',
                type : 'post',
                success : function (data) {
                    if(data.success){
                        render.renderMain(tplUrl, dataUrl, function(data){ return data}, function(){
                            bindUnfollowEvent();
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
            bindUnfollowEvent();
        }, emptyHtml);
    };
});