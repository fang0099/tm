<?php /* Smarty version Smarty-3.1.14, created on 2016-12-14 22:12:26
         compiled from "/var/www/html/tm/admin/templates/admin/page-left.html" */ ?>
<?php /*%%SmartyHeaderCode:3087465785851534aa82163-53800202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '787ec9fd694fd2c36c277502fdca707ee2cc43b1' => 
    array (
      0 => '/var/www/html/tm/admin/templates/admin/page-left.html',
      1 => 1481566118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3087465785851534aa82163-53800202',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5851534aa84897_43646335',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5851534aa84897_43646335')) {function content_5851534aa84897_43646335($_smarty_tpl) {?><div class="sidebar" id="sidebar">
					
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>
					
					<ul class="nav nav-list">
						<li mdata='index'>
							<a href="index.php?a=adminIndex&model=index">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 后台首页 </span>
							</a>
						</li>
						<li>	
							<a href="#" class="dropdown-toggle">
								<i class="icon-cog"></i>
								<span class="menu-text"> 网站基本设置 </span>
								<b class="arrow icon-angle-down"></b>
							</a>
							<ul class="submenu">
								<li mdata='webinfo'>
									<a href="index.php?a=adminIndex&m=form&model=webinfo&id=1">
										<i class="icon-double-angle-right"></i>
										<span class="menu-text"> 网站设置 </span>
									</a>
								</li>		
								<li mdata='flink'>
									<a href="index.php?a=adminIndex&m=ls&model=flink&type=modal">
										<i class="icon-double-angle-right"></i>
										<span class="menu-text"> 友情连接管理 </span>
									</a>
								</li>
								<li mdata='ads'>
									<a href="index.php?a=adminIndex&m=ls&model=ads&type=form">
										<i class="icon-double-angle-right"></i>
										<span class="menu-text"> 赞助商管理 </span>
									</a>
								</li>
							</ul>
						</li>
						
						
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-text-width"></i>
								<span class="menu-text"> 网站数据管理 </span>
								<b class="arrow icon-angle-down"></b>
							</a>
							<ul class="submenu">
								<li mdata='article'>
									<a href="index.php?a=adminIndex&m=ls&model=article&type=form">
										<i class="icon-double-angle-right"></i>
										<span class="menu-text"> 文章管理 </span>
									</a>
								</li>
								<li mdata='tag'>
									<a href="index.php?a=adminIndex&m=ls&model=tag&type=form">
										<i class="icon-double-angle-right"></i>
										<span class="menu-text"> 标签管理 </span>
									</a>
								</li>

							</ul>
						</li>
						

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-male"></i>
								<span class="menu-text"> 人员管理 </span>
								<b class="arrow icon-angle-down"></b>
							</a>
							<ul class="submenu">
								<!--
								<li mdata='vip'>
									<a href="#">
										<i class="icon-double-angle-right"></i>
										<span class="menu-text"> 会员管理 </span>
									</a>
								</li>
								-->
								<li mdata='user'>
									<a href="index.php?a=adminIndex&m=ls&model=user&type=form">
										<i class="icon-double-angle-right"></i>
										<span class="menu-text"> 用户管理 </span>
									</a>
								</li>
							</ul>
						</li>
						
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>
					
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
					
				</div><?php }} ?>