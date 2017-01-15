/*****************************************
*
* TM Project Page Service
* Author : Bean
* Contact : guhaibin1847@gmail.com
*
*****************************************/

__.services.page = __.services.page || {};


(function(){
	var utils = __.utils;
	var components = __.components;

	var deleteData = function (deleteUrl, ids) {
        $.ajax({
            type : 'GET',
            url : deleteUrl,
            data : {'ids' : ids},
            dataType : 'json',
            success : function (data) {
                if(data.success){
                    __.utils.reminder('操作成功');
                    components.iframe.outRefreshMain();
                }else {
                    alert('error' + data.message);
                }
            }
        });
    }

	var bind = function () {
		var formUrl = 'form?model=' + $('#model').val();
		var deleteUrl = 'delete?model=' + $('#model').val();
		$('.add').click(function(){
			components.iframe.outOpenRightSlider(formUrl);
		});
		$('.update').click(function () {
            components.iframe.outOpenRightSlider(formUrl + "&id=" + $(this).attr('data'));
        });
		$('.delete').click(function () {
			deleteData(deleteUrl, $(this).attr('data'))
        })
		$('.batch-delete').click(function(){
			var ids = '';
			$('.checkboxes:checked').each(function (k, v) {
                ids += $(v).val() + ",";
            });
			if(ids == ''){
                __.utils.reminder('没有选中任何行');
            }else {
                deleteData(deleteUrl, ids);
            }

		});

		$('.show-page').click(function(){
		    var dataStr = $(this).attr('data');
		    console.log(dataStr);
		    //var data = JSON.parse(dataStr);
            var data = eval('(' + dataStr + ')')
		    var pageUrl = 'page?model=' + data.model + '&id=' + data.id;
            components.iframe.outOpenRightSlider(pageUrl);
        });

		$('.show-list').click(function(){
		    var data = $(this).attr('data');
		    var pageUrl = 'articletag?id=' + data;
            components.iframe.outOpenRightSlider(pageUrl);
        });

    }

    __.services.page.init = bind;
})();

$(document).ready(function(){
	__.services.page.init();
});