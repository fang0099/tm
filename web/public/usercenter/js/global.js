/**************************************************
*
*	Project : Beta Front JS Project
*	Version : 1.0
* 	Module  : User Center Global
* 	Author  : Bean
* 	Contact : guhaibin1847@gmail.com
*
**************************************************/ 
define(function(require, exports, module){
    //var base = "http://localhost/tm/web/public/index.php";
    var base = "";
    exports.base = base;
    require('vendor/toastr');

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    exports.reminder = function(option){
        console.log(option);
        var message = option.message || '操作成功';
        if(option.type == 'error'){
            toastr.error(option.message);
        }else {
            toastr.success(message);
        }

    };
    
    exports.getJson = function (str) {
        return JSON.parse(str);
    }

    exports.makePagination = function(url, count, pageSize, currentPage){
        var allPage = Math.ceil(count / pageSize);
        var html = "";
        if(allPage > 1){
            var begin = currentPage - 4 > 0 ? currentPage - 4 : 1;
            var end = allPage - currentPage > 4 ? currentPage + 4 : allPage;
            for(var i = begin ; i <= end; i++){
                if(i == currentPage){
                    html += '<li class="page current"><a href="javascrit:;">' + i + '</a></li>';
                }else {
                    if(url == 'javascrit:;'){
                        html += '<li class="page"><a href="javascript:;">'+ i +'</a></li>'
                    }else {
                        html += '<li class="page"><a href="'+ url +'/'+ i +'">'+ i +'</a></li>'
                    }

                }
            }
        }
        return html;
    };
});