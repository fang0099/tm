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

		if($iframe && $pageContent){
			var width = $pageContent.width();
			var height = $pageContent.height();	
			$iframe.width(width - 10);
			$iframe.height(height);
		}
		console.log('fix iframe size');
	};


	__.utils.fixMainIframeSize = fixMainIframeSize;


	__.utils.callback = __.utils.callback || {};
	__.utils.callback.reminder = function(){
		alert('操作成功');
	};
    __.utils.callback.closeAndRefreshMain = function(){
        __.components.iframe.outCloseRightAndRefreshMain();
    };
})(T);