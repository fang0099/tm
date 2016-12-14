<?php /* Smarty version Smarty-3.1.14, created on 2016-12-14 22:16:21
         compiled from "/var/www/html/tm/web/public/admin/templates/admin/list.html" */ ?>
<?php /*%%SmartyHeaderCode:42948192258515435ae2475-93746030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04d0f7f940a74af160c7f79821edd57709704e74' => 
    array (
      0 => '/var/www/html/tm/web/public/admin/templates/admin/list.html',
      1 => 1479738614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42948192258515435ae2475-93746030',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'model' => 0,
    'column' => 0,
    'list' => 0,
    'l' => 0,
    'modal' => 0,
    'aoColumns' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58515435b3c966_50707535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58515435b3c966_50707535')) {function content_58515435b3c966_50707535($_smarty_tpl) {?><!DOCTYPE html>
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
								<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
管理
								<small>
									<i class="icon-double-angle-right"></i>
									 查看
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php if (in_array("add",$_smarty_tpl->tpl_vars['data']->value['operations'])||in_array("batch-delete",$_smarty_tpl->tpl_vars['data']->value['operations'])){?>
								<div class="">
									<?php if (in_array("add",$_smarty_tpl->tpl_vars['data']->value['operations'])){?>
										<?php if ($_GET['type']=='modal'){?>
										<a href="javascript:;" class="btn btn-primary" 
											action="modal"
											data = "<target : '#<?php echo $_smarty_tpl->tpl_vars['model']->value;?>
Modal', form : '#<?php echo $_smarty_tpl->tpl_vars['model']->value;?>
-form', title : '添加<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
'>"
											><i class="icon-plus"></i>添加<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</a>
										<?php }else{ ?>
										<a href="index.php?a=adminIndex&m=form&model=<?php echo $_smarty_tpl->tpl_vars['model']->value;?>
" class="btn btn-primary" 
											action="form"
											><i class="icon-plus"></i>添加<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</a>
										<?php }?>
									<?php }?>
									<?php if (in_array("batch-delete",$_smarty_tpl->tpl_vars['data']->value['operations'])){?>
									<a href="javascript:;" class="btn btn-danger" action='batch-delete' data = "<target : '.ids', model : '<?php echo $_smarty_tpl->tpl_vars['model']->value;?>
'>"><i class="icon-trash"></i>删除<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</a>
									<?php }?>
								</div>
								<div class="hr hr32 hr-dotted"></div>
								<?php }?>
								<div class="table-responsive">
									<table id="table" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="center">
													<label> 
													<input type="checkbox"	class="ace" /> <span class="lbl"></span>
													</label>
												</th>
												<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value){
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
													<?php if ($_smarty_tpl->tpl_vars['column']->value['showInTable']=='yes'){?>
														<th><?php echo $_smarty_tpl->tpl_vars['column']->value['columnName'];?>
</th>
													<?php }?>
												<?php } ?>
												<th class='center'>
													操作
												</th>
											</tr>
										</thead>
		
										<tbody>
											
											<?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value){
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
												<tr>
													<td class="center">
															<label>
																<input type="checkbox" class="ace ids" value='<?php echo $_smarty_tpl->tpl_vars['l']->value['id'];?>
' />
																<span class="lbl"></span>
															</label>
													</td>
													<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value){
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
														<?php if ($_smarty_tpl->tpl_vars['column']->value['showInTable']=='yes'){?>
														<td>
															<?php if ($_smarty_tpl->tpl_vars['column']->value['tableColumn']){?>
																<?php echo $_smarty_tpl->tpl_vars['l']->value[$_smarty_tpl->tpl_vars['column']->value['tableColumn']];?>

															<?php }else{ ?>
																<?php if ($_smarty_tpl->tpl_vars['column']->value['preview']){?>
																	<img src='<?php echo $_smarty_tpl->tpl_vars['l']->value[$_smarty_tpl->tpl_vars['column']->value['preview']];?>
' width='100' />
																<?php }else{ ?>
																	<?php echo $_smarty_tpl->tpl_vars['l']->value[$_smarty_tpl->tpl_vars['column']->value['column']];?>

																<?php }?>
															<?php }?>
														</td>
														<?php }?>
													<?php } ?>
													<td>
														<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
																<?php if (in_array("update",$_smarty_tpl->tpl_vars['data']->value['operations'])){?>
																	<?php if ($_GET['type']=='modal'){?>
																	<a class="green alteruser" href="javascript:;" 
																		action='modal'
																		data = "<target : '#<?php echo $_smarty_tpl->tpl_vars['model']->value;?>
Modal', form : '#<?php echo $_smarty_tpl->tpl_vars['model']->value;?>
-form', title : '修改<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
', id : '<?php echo $_smarty_tpl->tpl_vars['l']->value['id'];?>
', model : '<?php echo $_smarty_tpl->tpl_vars['model']->value;?>
'>"
																		 >
																		<i class="icon-pencil bigger-130"></i>
																	</a>
																	<?php }else{ ?>
																	<a class="green alteruser" href="index.php?a=adminIndex&m=form&model=<?php echo $_smarty_tpl->tpl_vars['model']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['l']->value['id'];?>
" 
																	 >
																	<i class="icon-pencil bigger-130"></i>
																	</a>
																	<?php }?>
																<?php }?>
																<?php if (in_array("delete",$_smarty_tpl->tpl_vars['data']->value['operations'])){?>
																<a class="red deleteuser" href="javascript:;" 
																	action='delete'
																	data="<id : '<?php echo $_smarty_tpl->tpl_vars['l']->value['id'];?>
', model : '<?php echo $_smarty_tpl->tpl_vars['model']->value;?>
'>"
																	 >
																	<i class="icon-trash bigger-130"></i>
																</a>
																<?php }?>
														</div>
														
													</td>
												</tr>	
											<?php } ?>
										</tbody>
									</table>
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

<?php if ($_GET['type']=='modal'){?>
<?php echo $_smarty_tpl->tpl_vars['modal']->value;?>

<?php }?>
		<!-- basic scripts -->

		<?php echo $_smarty_tpl->getSubTemplate ('admin/script.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<!-- inline scripts related to this page -->
<script>
	$(function(){
		var oTable1 = $('#table').dataTable( {
				"aoColumns" : [
				      {
				    	  "bSortable" : false
				   		},
				      <?php echo $_smarty_tpl->tpl_vars['aoColumns']->value;?>

				      {
				    	  "bSortable" : false
				    	}
				 ],
				"oLanguage": {
		                    "sProcessing": "正在加载中......",
		                    "sLengthMenu": "每页显示 _MENU_ 条记录",
		                    "sZeroRecords": "对不起，查询不到相关数据！",
		                    "sEmptyTable": "表中无数据存在！",
		                    "sInfo": "当前显示 _START_ 到 _END_ 条，共 _TOTAL_ 条记录",
		                    "sInfoFiltered": "数据表中共为 _MAX_ 条记录",
		                    "sSearch": "搜索",
		                    "oPaginate": {
		                        "sFirst": "首页",
		                        "sPrevious": "上一页",
		                        "sNext": "下一页",
		                        "sLast": "末页"
		                    }
		        },
	       }
		);
		$('table th input:checkbox').on('click' , function(){
			var that = this;
			$(this).closest('table').find('tr > td:first-child input:checkbox')
			.each(function(){
				this.checked = that.checked;
				$(this).closest('tr').toggleClass('selected');
			});
				
		});
		
		$('.bean-file').on('change', function(){
			$.common.ajaxUpload('index.php?a=adminDo&m=test', $(this).attr('name'));
		});
	});
</script>
</body>
</html>

<?php }} ?>