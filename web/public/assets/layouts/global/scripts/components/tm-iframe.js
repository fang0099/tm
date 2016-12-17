/*****************************************
*
* TM Project Iframe Component
* Author : Bean
* Contact : guhaibin1847@gmail.com
*
*****************************************/

__.components.iframe = __.components.iframe || {};


(function(){

	var openRightSlider = function(url){
		if(url){
            $('iframe[name=sidebar]').attr('src', url);
		}
		$('body').addClass('page-quick-sidebar-open');
	};

	var closeRightSlider = function(){
		$('body').removeClass('page-quick-sidebar-open');
	};

	var outOpenRightSlider = function(url){
        outRefreshSlider(url);
		$('body', parent.document).addClass('page-quick-sidebar-open');
	};

	var outCloseRightSlider = function(){
		$('body', parent.document).removeClass('page-quick-sidebar-open');	
	};

	var refresh = function($iframe, url){
		if(url){
			$iframe.attr('src', url);	
		}else {
			$iframe.attr('src', $iframe.attr('src'));	
		}
	};


	var refreshMain = function(url){
		var $iframe = $('iframe[name=main]');
		refresh($iframe, url);
	};

	var refreshRightSlider = function(url){
		var $iframe = $('iframe[name=sidebar]');
		refresh($iframe, url);
	};

	var outRefreshMain = function(url){
		var $iframe = $('iframe[name=main]', parent.document);
		refresh($iframe, url);
	};
	
	var outRefreshSlider = function (url) {
        var $iframe = $('iframe[name=sidebar]', parent.document);
        refresh($iframe, url);
    }
	
	var outCloseRightAndRefreshMain = function () {
		outCloseRightSlider();
        outRefreshMain();
    }


	__.components.iframe.openRightSlider = openRightSlider;
	__.components.iframe.closeRightSlider = closeRightSlider;
	__.components.iframe.outOpenRightSlider = outOpenRightSlider;
	__.components.iframe.outCloseRightSlider = outCloseRightSlider;
	__.components.iframe.refreshMain = refreshMain;
	__.components.iframe.outRefreshMain = outRefreshMain;
	__.components.iframe.refreshRightSlider = refreshRightSlider;
    __.components.iframe.outCloseRightAndRefreshMain = outCloseRightAndRefreshMain;
})();