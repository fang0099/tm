/*****************************************
*
* TM Project Form Service
* Author : Bean
* Contact : guhaibin1847@gmail.com
*
*****************************************/

__.services.form = __.services.form || {};


(function(){
	var utils = __.utils;
	var iframe = __.components.iframe;
	var $form = $('#form');
	var $cancle = $('.cancle');

	var init = function(){
		// bind form
		$form.submit(function(before, success){
			var option = {
				beforeSubmit : function(){
					// call before
					return true;
				},
				dataType : 'json',
				success : function(data){
					if(data.success == 'true'){
						var callback = $form.attr('callback');
						if(callback){
							if(__.utils.callback[callback]){
                                __.utils.callback[callback]();
							}else {
								window[callback]();
							}
						}else {
                            iframe.outRefreshMain();
						}
					}else {
						alert(data.message);
					}
				}
			}
			$(this).ajaxSubmit(option);
			return false;
		});	
		// bind cancle
		$cancle.click(function(){
			iframe.outCloseRightSlider();
		});
	};

	__.services.form.init = init;
})();

$(document).ready(function(){
	__.services.form.init();
});