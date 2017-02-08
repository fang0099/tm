
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
                if(data.success == 'true' || data.success == true){
                    var page = $('[name=page]').val();
                    render.renderMain(tplUrl, dataUrl + '/' + page, function(data){ return data}, function(data, html){
                        bindDeleteEvent();
                        genPagination(page);
                        bindPageEvent();
                    }, emptyHtml);
                }else {
                    global.reminder({message : data['message']});
                }
            });
        });
    };

    var global = require('global');
    var pageSize = 10;

    var genPagination = function(currentPage){
        var noticeCount = user.unreadNoticeCount;
        var pagination = global.makePagination('javascrit:;', noticeCount, pageSize, currentPage);
        $('ul.pagination').html(pagination);
    };

    var bindPageEvent = function(){
        var $ul = $('ul.pagination');
        var tpl = $('#notice-for').html();
        var $list = $('.bookmark-list');
        $ul.find('a').click(function(){
            var $this = $(this);
            var page = $this.html();
            render.renderTpl(tpl, dataUrl + '/' + page, function(data){return data}, function(data, html){
                $list.html(html);
                $ul.find('li.page').removeClass('current');
                $this.parent('li').addClass('current');
                $('[name=page]').val(page);
                bindDeleteEvent();
            });
        });
    };

    exports.active = function(){
        render.renderMain(tplUrl, dataUrl + '/1', function(data){ return data}, function(){
            bindDeleteEvent();
            genPagination(1);
            bindPageEvent();
        }, emptyHtml);
    };
});