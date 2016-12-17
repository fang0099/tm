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
								{$data.name}管理
								<small>
									<i class="icon-double-angle-right"></i>
									 查看
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								{if "add"|in_array:$data.operations || "batch-delete"|in_array:$data.operations}
								<div class="">
									{if "add"|in_array:$data.operations}
										{if $smarty.get.type == 'modal'}
										<a href="javascript:;" class="btn btn-primary" 
											action="modal"
											data = "<target : '#{$model}Modal', form : '#{$model}-form', title : '添加{$data.name}'>"
											><i class="icon-plus"></i>添加{$data.name}</a>
										{else}
										<a href="index.php?a=adminIndex&m=formf&model={$model}" class="btn btn-primary" 
											action="form"
											><i class="icon-plus"></i>添加{$data.name}</a>
										{/if}
									{/if}
									{if "batch-delete"|in_array:$data.operations}
									<a href="javascript:;" class="btn btn-danger" action='batch-delete' data = "<target : '.ids', model : '{$model}'>"><i class="icon-trash"></i>删除{$data.name}</a>
									{/if}
								</div>
								<div class="hr hr32 hr-dotted"></div>
								{/if}
								<div class="table-responsive">
									<table id="table" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="center">
													<label> 
													<input type="checkbox"	class="ace" /> <span class="lbl"></span>
													</label>
												</th>
												{foreach $data.columns as $column}
													{if $column.showInTable == 'yes'}
														<th>{$column.columnName}</th>
													{/if}
												{/foreach}
												<th class='center'>
													操作
												</th>
											</tr>
										</thead>
		
										<tbody>
											
											{foreach $list as $l}
												<tr>
													<td class="center">
															<label>
																<input type="checkbox" class="ace ids" value='{$l.id}' />
																<span class="lbl"></span>
															</label>
													</td>
													{foreach $data.columns as $column}
														{if $column.showInTable == 'yes'}
														<td>
															{if $column.tableColumn}
																{$l[$column.tableColumn]}
															{else}
																{if $column.preview}
																	<img src='{$l[$column.preview]}' width='100' />
																{else}
																	{$l[$column.column]}
																{/if}
															{/if}
														</td>
														{/if}
													{/foreach}
													<td>
														<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
																{if "update"|in_array:$data.operations}
																	{if $smarty.get.type == 'modal'}
																	<a class="green alteruser" href="javascript:;" 
																		action='modal'
																		data = "<target : '#{$model}Modal', form : '#{$model}-form', title : '修改{$data.name}', id : '{$l.id}', model : '{$model}'>"
																		 >
																		<i class="icon-pencil bigger-130"></i>
																	</a>
																	{else}
																	<a class="green alteruser" href="index.php?a=adminIndex&m=formf&model={$model}&id={$l.id}" 
																	 >
																	<i class="icon-pencil bigger-130"></i>
																	</a>
																	{/if}
																{/if}
																{if "delete"|in_array:$data.operations}
																<a class="red deleteuser" href="javascript:;" 
																	action='delete'
																	data="<id : '{$l.id}', model : '{$model}'>"
																	 >
																	<i class="icon-trash bigger-130"></i>
																</a>
																{/if}
														</div>
														
													</td>
												</tr>	
											{/foreach}
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

{if $smarty.get.type == 'modal'}
{$modal}
{/if}
		<!-- basic scripts -->

		{include file='admin/script.html'}

		<!-- inline scripts related to this page -->
<script>
	$(function(){
		var oTable1 = $('#table').dataTable( {
				"aoColumns" : [
				      {
				    	  "bSortable" : false
				   		},
				      {$aoColumns}
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

