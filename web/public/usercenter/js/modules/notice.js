
define(function(require, exports, modules){

    var render = require('render');
    var tplUrl = "usercenter/tpl/user-notice.tpl";
    var dataUrl = "/uc/notices";
    var emptyHtml = $.ajax({
        url : "usercenter/tpl/user-empty-notice.tpl",
        async : false
    }).responseText;
    var deleteUrl = "/uc/deletenotice";
    var bindDeleteEvent = function () {
        $('.js-delete').click(function(){
            var data = $(this).attr('data');
            console.log(data);
            var url = deleteUrl + '/' + data;
            $.getJSON(url, function(data){
                if(data.success == 'success' || data.success == true){
                    render.renderMain(tplUrl, dataUrl, function(data){ return data}, function(){
                        bindDeleteEvent();
                    }, emptyHtml);
                }else {
                    global.reminder({message : data['message']});
                }
            });
        });
    }

    exports.active = function(){
        render.renderMain(tplUrl, dataUrl, function(data){ return data}, function(){
            bindDeleteEvent();
        }, emptyHtml);
    };
});