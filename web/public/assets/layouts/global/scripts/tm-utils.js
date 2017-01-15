/*****************************************
*
* TM Project Utils
* Author : Bean
* Contact : guhaibin1847@gmail.com
*
*****************************************/

(function (__) {

	var fixMainIframeSize = function () {
		var $iframe = $('iframe[name=main]');
		var $pageContent = $('.page-content');
		var windowHeight = $(window).height();
		var windowWidth = $(window).width();
		console.log(windowHeight);
		//$('.page-content').height(windowHeight - 50);
		$('.tab-content').height(windowHeight - 50);
		$iframe.width($pageContent.width());
		$iframe.height($pageContent.height());
		console.log('fix iframe size');
	};
	

	__.utils.fixMainIframeSize = fixMainIframeSize;

	__.utils.reminder = function(message){
        alert(message);
    };
	__.utils.callback = __.utils.callback || {};
	__.utils.callback.reminder = function(){
		alert('操作成功');
	};
    __.utils.callback.closeAndRefreshMain = function(){
        __.components.iframe.outCloseRightAndRefreshMain();
    };
})(T);