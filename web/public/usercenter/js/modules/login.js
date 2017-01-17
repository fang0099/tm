define(function(require, exports, modules){

	require('vendor/jquery.form');

    var $changeLogin = $('.change-login');
    var $changeReg = $('.change-reg');
    var $regBtn = $('#confirm-reg');
    var $loginBtn = $('#confirm-login');
    var $verifyBtn = $('#confirm-verify');
    var $captchaDiv = $('.captcha-div');

    var loginUrl = 'signin';
    var regUrl = 'signup';

    $changeLogin.click(function(){
    	$('.login-div').removeClass('hide');
    	$('.reg-div, .verify-div').addClass('hide');
    	$('.title').html('登录贝塔区块链');
    	location.hash = '#login';
    });

    $changeReg.click(function(){
    	$('.reg-div').removeClass('hide');
    	$('.login-div, .verify-div').addClass('hide');
    	$('.title').html('注册贝塔区块链');
    	location.hash = '#reg';
    });

    var isEmail = function(str){
    	return /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/.test(str); 
    };
    var $loginForm = $('#login-form');
    var $error = $('.login-error');
    
    $('#login-form').submit(function(before, success){
			var option = {
				beforeSubmit : function(){
					var email = $loginForm.find('[name=email]').val();
					if(!isEmail(email)){
						$loginForm.find('.email-error').removeClass('hide');
						return false;
					}
					
					var pwd = $loginForm.find('[name=password]').val();
					if(pwd == ''){
						$loginForm.find('.password-error').removeClass('hide');
						return false;		
					}
					$loginForm.find('div.error').addClass('hide');
					$error.addClass('hide');
					return true;
				},
				dataType : 'json',
				success : function(data){
					if(data.success == true){
						location.href = '/';
					}else {
						$error.find('span').html(data.message);
						$error.removeClass('hide');
						$error.find('.error').removeClass('hide');
						if(data.login_failed_times >= 3){
							$captchaDiv.removeClass('hide');
						}
					}
				}
			}
			$(this).ajaxSubmit(option);
			return false;
	});
	
    var $regForm = $('#reg-form');
    $('#reg-form').submit(function(before, success){
			var option = {
				beforeSubmit : function(){
					var email = $regForm.find('[name=email]').val();
					if(!isEmail(email)){
						$('.email-error').removeClass('hide');
						return false;
					}
					var username = $regForm.find('[name=username]').val();
					if(username == ''){
						$('.username-error').removeClass('hide');
						return false;	
					}
					var pwd = $regForm.find('[name=password]').val();
					if(pwd == ''){
						$('.password-error').removeClass('hide');
						return false;		
					}
					var pwd2 = $regForm.find('[name=passwordConfirm]').val();
					if(pwd != pwd2){
						$('.confirm-password-error').removeClass('hide');
						return false;			
					}
					$regForm.find('div.error').addClass('hide');
					return true;
				},
				dataType : 'json',
				success : function(data){
					if(data.success == 'true'){
						$('.mail').html($regForm.find('[name=email]').val());
						$('.login-div, .reg-div').addClass('hide');
						$('.verify-div').removeClass('hide');

						//location.href = '/';
					}else {
						var $error = $regForm.find('div.' + data.data + '-error');
						$error.find('span').html(data.message);
						$error.removeClass('hide');
					}
				}
			}
			$(this).ajaxSubmit(option);
			return false;
	});
    var $btn = $('#re-send-email');
    var sendMail = function(){
    	$.get('send-check-mail/' + $regForm.find('[name=email]').val(), function(data){
    		
    		$btn.html('(60)秒后重新发送');
    		$btn.attr('disabled', true);
    		var m = 60;
    		var interval = setInterval(function(){
    			m--;
    			$btn.html('('+m+')秒后重新发送');
    		}, 1 * 1000);
    		setTimeout(function(){
    			$btn.html('重新发送');
    			$btn.attr('disabled', false);
    			clearInterval(interval);
    		}, 61 * 1000);
    	});
    };
    $btn.click(function(){
    	sendMail();
    });

	var $verifyForm = $('#verify-form');
	$verifyForm.submit(function(before, success){
			var option = {
				beforeSubmit : function(){
					var verifyCode = $verifyForm.find('[name=verifyCode]').val();
					if(verifyCode == ''){
						$('.verifyCode-error').removeClass('hide');
						return false;
					}
					return true;
				},
				dataType : 'json',
				success : function(data){
					if(data.success == 'true'){
						location.href = '/';
					}else {
						var $error = $verifyForm.find('div.verify-error');
						$error.removeClass('hide');
					}
				}
			}
			$(this).ajaxSubmit(option);
			return false;
	});

	var captchaImg = $('#captcha-img');
	captchaImg.click(function(){
		var $this = $(this);
		$.ajax({
			url : 'captcha',
			dataType : 'text',
			type : 'get',
			success : function(data){
				$this.attr('src', data);
			}
		});
	});

	if(loginFailedTimes >= 3){
		$captchaDiv.removeClass('hide');
	}
	//$('#confirm-login').click();
	var select = function(){
		var hash = location.hash;
		if(hash == '#login'){
			$changeLogin.click();
		}	
	};
	select();

});