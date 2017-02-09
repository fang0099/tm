define(function(require, exports, modules){

	require('vendor/jquery.form');

	var $step1Div = $('.step1-div');
    var $step2Div = $('.step2-div');
    var $step3Div = $('.step3-div');

    var $step1Btn = $('#step1');
    var $step2Btn = $('#step2');
    var $step3Btn = $('#step3');
	var $emailError = $('.email-error');

	var $step1Email = $step1Div.find('[name=email]');

	$step1Btn.click(function(){
		var email = $step1Email.val();
		if(isEmail(email)){
			$.ajax({
				url : '/reset/sendmail/' + email,
				dataType : 'json',
				type : 'get',
				success : function (data) {
					if(data.success == 'true' || data.success){
						$('.mail').html(email);
						$step1Div.addClass('hide');
						$step2Div.removeClass('hide');
					}else {
						$emailError.find('span').html('邮箱未注册');
						$emailError.removeClass('hide');
					}
                }
			});
		}else {
			$emailError.find('span').html('请输入合法的邮箱地址');
			$emailError.removeClass('hide');
		}
	});

	$step2Btn.click(function(){
		var code = $('[name=verifyCode]').val();
		$.ajax({
			url : '/reset/verify/' + code,
			type : 'get',
			dataType : 'json',
			success : function (data) {
				if(data.success || data.success == 'true'){
					$step2Div.addClass('hide');
					$step3Div.removeClass('hide');
				}else {
					$('.verify-error').removeClass('hide');
				}
            }
		});
	});

	$step3Btn.click(function () {
		var pwd = $('[name=newpwd]').val();
		if(pwd){
			$.ajax({
				url : '/reset/pwd',
				data : {pwd : pwd},
				type : 'post',
				dataType : 'json',
				success : function(data){
					if(data.success || data.success == 'true'){
						window.location.href = '/uc#index';
					}else {

					}
				}
			});
		}
    });


    var isEmail = function(str){
    	return /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/.test(str); 
    };

	var $btn = $('#re-send-email');
    var sendMail = function(email){
    	$.get('/reset/sendmail/' + email, function(data){
    		
    		$btn.html('(60)秒后再发');
    		$btn.attr('disabled', true);
    		var m = 60;
    		var interval = setInterval(function(){
    			m--;
    			$btn.html('('+m+')秒后再发送');
    		}, 1 * 1000);
    		setTimeout(function(){
    			$btn.html('重新发送');
    			$btn.attr('disabled', false);
    			clearInterval(interval);
    		}, 61 * 1000);
    	});
    };
    $btn.click(function(){
    	if(!$(this).attr('disabled')){
            sendMail($step1Email.val());
		}
	});



});