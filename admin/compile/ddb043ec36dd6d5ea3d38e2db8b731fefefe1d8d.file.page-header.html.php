<?php /* Smarty version Smarty-3.1.14, created on 2016-12-14 22:12:26
         compiled from "/var/www/html/tm/admin/templates/admin/page-header.html" */ ?>
<?php /*%%SmartyHeaderCode:15458091185851534aa6eea3-17385175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddb043ec36dd6d5ea3d38e2db8b731fefefe1d8d' => 
    array (
      0 => '/var/www/html/tm/admin/templates/admin/page-header.html',
      1 => 1481566786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15458091185851534aa6eea3-17385175',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5851534aa7f671_25992744',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5851534aa7f671_25992744')) {function content_5851534aa7f671_25992744($_smarty_tpl) {?><div class="navbar navbar-default" id="navbar">
			
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
			
			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="index.php?a=adminIndex" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							<?php if ($_SESSION['isadmin']=='1'){?>
							网站后台管理系统
							<?php }else{ ?>
							个人中心
							<?php }?>
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
									<small>欢迎光临,</small>
									<?php echo $_SESSION['username'];?>

								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="../index.php">
										<i class="icon-share-alt"></i>
										前台首页
									</a>
								</li>
								<li>
									<a href="index.php?a=user&m=logout">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div><?php }} ?>