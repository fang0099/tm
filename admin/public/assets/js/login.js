$(function(){
	$('#login-form').submit(function(){
		var option = {
			beforeSubmit : function(){
				if(!$('input[name=username]').val()){
					alert('用户名不能为空');
					return false;
				}else if(!$('input[name=pwd]').val()){
					alert('密码不能为空');
					return false;
				}
				return true;
			},
			dataType : 'json',
			success : function(data){
				if(data.status == '1'){
					window.location = 'index.php?a=adminIndex';
				}else {
					alert(data.message);
				}
			}
		}
		$(this).ajaxSubmit(option);
		return false;
	});
});