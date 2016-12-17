$(function(){
	$('.price-search').click(function(){
		var low = ~~$('[name=low]').val();
		var heigh = ~~$('[name=heigh]').val();
		if(low == 0){
			alert('请填写最低价格');
			return;
		}
		if(heigh == 0){
			alert('请填写最高价格');
			return;
		}
		if(heigh < low){
			alert('最低价格不能高于最高价');
			return;
		}
		var url = 'index.php?a=list&m=searchresult&type=price&low='+low + "&heigh="+heigh;
		window.location.href = url;
	});
	
	$('.go-login').click(function(){
		window.location.href = 'index.php?a=index&m=showreg';
	});
	
	$('#register-form').submit(function(){
		var options = {
				beforeSubmit : function(){
					var form = $('#register-form');
				},
				type:'POST',
				success: function(data){
					if(data.status==1){
						alert('注册成功');
						//window.location.href = 'index.php';
					}else {
						alert(data.message);
					}
				},
				dataType : 'json'
			};
		$(this).ajaxSubmit(options);
		return false;
	});
	
	$('#login-form').submit(function(){
		var options = {
				beforeSubmit : function(){
					var form = $('#login-form');
					var email = form.find('[name=email]');
					if(!email){
						alert('邮箱不能为空');
						return false;
					}
					var pwd = form.find('[name=pwd]');
					if(!pwd){
						alert('密码不能为空');
						return false;
					}
				},
				type:'POST',
				success: function(data){
					if(data.status==1){
						alert('登陆成功');
						window.location.href = 'index.php';
					}else {
						alert(data.message);
					}
				},
				dataType : 'json'
			};
		$(this).ajaxSubmit(options);
		return false;
	});
	
	$('.favor').click(function(){
		var data = $(this).attr('data');
		var that = $(this); 
		$.ajax({
			url : 'index.php?a=user&m=favor',
			data : {'id' : data},
			dataType : 'json',
			type : 'POST',
			success : function(data){
				if(data.status == 1){
					that.attr('data', '0');
					that.html('已收藏');
				}else {
					alert(data.message);
				}
			}
		});
	});
	
	$('#message-add').submit(function(){
		var options = {
				beforeSubmit : function(){
					var form = $('#message-add');
					var pass = true;
					form.find('[check=required]').each(function(){
						if(!$(this).val()){
							pass = false;
						}
					});
					return pass;
				},
				type:'POST',
				success: function(data){
					if(data.status==1){
						alert('发布成功');
						window.location.reload();
					}else {
						alert(data.message);
					}
				},
				dataType : 'json'
			};
		$(this).ajaxSubmit(options);
		return false;
	});
	
	$('.exchange').click(function(){
		var rate = $('#mtype').val();
		var money = ~~$('#money').val();
		var jmoney = money * rate;
		$('#jmoney').val(jmoney.toFixed(2));
	});
	
	$('.img-small').click(function(){
		var src = $(this).find('img').attr('src');
		$('#img-big').attr('src', src);
	});
	
	$('.pre-img').click(function(){
		var lis = $('.imgs').find('li');
		if(lis.length <= 4){
			return;
		}
		for(var i = 0 ; i < lis.length ; i++){
			var li = $(lis[i]);
			if (li.attr('style') != 'display:none') {
				i--;
				li = $(lis[i]);
				li.attr('style', 'display:block');
				break;
			}
		}
		var i = lis.length - 1;
		for(; i > 0 ; i--){
			if(li.attr('style') != 'display:none'){
				break;
			}
		}
		for(var j = lis.length - 1 ; j >= i ; j--){
			$(lis[j]).attr('style', 'display:none');
		}
	});
	
	$('.next-img').click(function(){
		var lis = $('.imgs').find('li');
		if(lis.length <= 4){
			return;
		}
		for(var i = 0 ; i < lis.length ; i++){
			var li = $(lis[i]);
			if (li.attr('style') != 'display:none') {
				li.attr('style', 'display:none');
				break;
			}
		}
		for(var i = lis.length -1 ; i > 0 ; i--){
			var li = $(lis[i]);
			if(li.attr('style') == 'display:none'){
				li.attr('style', 'display:block');
				break;
			}
		}
	});
	
	$('.area-parent').click(function(){
		$(this).siblings('ul').toggle(500);
	});
	
	$('.left-menu li').hover(function(){
		$(this).children('a').css('color', '#fff');
	}, function(){
		$(this).children('a').css('color', '#991c46');
	});
	
});