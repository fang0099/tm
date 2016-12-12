<!DOCTYPE html>
<html lang="en">
	<head>
		{include file='admin/header.html'}
	</head>

	<body>
		{include file='admin/page-header.html'}

		<div class="main-container" id="main-container">
			{literal}
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			{/literal}
			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				{include file='admin/page-left.html'}

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						{literal}
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
						{/literal}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">首页</a>
							</li>
							<li class="active">控制台</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								修改登陆密码
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
									<form class="form-horizontal" role="form" action='index.php?a=user&m=modifypwd' method='post' callback='$.callback.stay' before='checkpwd'>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 原密码 </label>
											<div class="col-sm-9">
												<input type="password"  class="col-xs-10 col-sm-5" name='oldpwd' required/>
											</div>
										</div>

										<div class="space-4"></div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 新密码 </label>
											<div class="col-sm-9">
												<input type="password"  class="col-xs-10 col-sm-5" name='pwd' required/>
											</div>
										</div>
										
										<div class="clearfix form-actions">
											<div class="col-md-offset-3 col-md-9">
												<button class="btn btn-info" type="submit">
													<i class="icon-ok bigger-110"></i>
													提交
												</button>
	
											</div>
										</div>
										
										
									</form>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		{include file='admin/script.html'}

		<!-- inline scripts related to this page -->
		<script src="public/assets/js/dropzone.min.js"></script>
<script>
$(function(){
	
});

function checkpwd(){
	var old = $('[name=oldpwd]').val();
	if(!old){
		alert('旧密码不能为空');
		return false;
	}
	var newpwd = $('[name=pwd]').val();
	if(!newpwd){
		alert('密码不能为空');
		return false;
	}
	return true;
}
</script>
</body>
</html>

