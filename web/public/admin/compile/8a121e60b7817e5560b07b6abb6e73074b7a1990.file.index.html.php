<?php /* Smarty version Smarty-3.1.14, created on 2016-12-14 22:16:18
         compiled from "/var/www/html/tm/web/public/admin/templates/admin/index.html" */ ?>
<?php /*%%SmartyHeaderCode:113738879758515432af8820-56309998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a121e60b7817e5560b07b6abb6e73074b7a1990' => 
    array (
      0 => '/var/www/html/tm/web/public/admin/templates/admin/index.html',
      1 => 1479738614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113738879758515432af8820-56309998',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58515432b5bb75_78339063',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58515432b5bb75_78339063')) {function content_58515432b5bb75_78339063($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('admin/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</head>

	<body>
		<?php echo $_smarty_tpl->getSubTemplate ('admin/page-header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<div class="main-container" id="main-container">
			
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			
			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<?php echo $_smarty_tpl->getSubTemplate ('admin/page-left.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
						
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
								控制台
								<small>
									<i class="icon-double-angle-right"></i>
									 查看
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>

									<i class="icon-ok green"></i>

									欢迎使用
								</div>

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

		<?php echo $_smarty_tpl->getSubTemplate ('admin/script.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<!-- inline scripts related to this page -->

</body>
</html>

<?php }} ?>