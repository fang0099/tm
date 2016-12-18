<?php /* Smarty version Smarty-3.1.14, created on 2016-12-14 22:12:24
         compiled from "/var/www/html/tm/admin/templates/admin/login.html" */ ?>
<?php /*%%SmartyHeaderCode:544230885585153489f6c70-08192416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e230432d0c04314efb9f248a743c01dee8631663' => 
    array (
      0 => '/var/www/html/tm/admin/templates/admin/login.html',
      1 => 1479738614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '544230885585153489f6c70-08192416',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58515348a69d37_54977301',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58515348a69d37_54977301')) {function content_58515348a69d37_54977301($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('admin/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<span class="white">欢迎登陆</span>
								</h1>
								<h4 class="blue">&copy; 网站后台管理系统</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												请输入用户名和密码
											</h4>

											<div class="space-6"></div>

											<form action='index.php?a=adminUser&m=dologin' method='post' id='login-form'>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="用户名" name='username' />
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="密码" name='pwd'/>
															<i class="icon-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="icon-key"></i>
															Login
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

										</div><!-- /widget-main -->

									</div><!-- /widget-body -->
								</div><!-- /login-box -->


							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->

		<?php echo $_smarty_tpl->getSubTemplate ('admin/script.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<script type="text/javascript" src='public/assets/js/login.js'></script>

</body>
</html>
<?php }} ?>