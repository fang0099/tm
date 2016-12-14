<?php /* Smarty version Smarty-3.1.14, created on 2016-12-14 22:16:38
         compiled from "/var/www/html/tm/web/public/admin/templates/admin/form.html" */ ?>
<?php /*%%SmartyHeaderCode:48688964658515446a38df2-78138869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e25cff90c84c0df084b71843e669f22660553527' => 
    array (
      0 => '/var/www/html/tm/web/public/admin/templates/admin/form.html',
      1 => 1479738614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48688964658515446a38df2-78138869',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'form' => 0,
    'res_json' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_58515446a48419_62959853',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58515446a48419_62959853')) {function content_58515446a48419_62959853($_smarty_tpl) {?><!DOCTYPE html>
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
								<?php echo $_smarty_tpl->tpl_vars['action']->value;?>

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<?php echo $_smarty_tpl->tpl_vars['form']->value;?>


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
		<script src="public/assets/js/dropzone.min.js"></script>
<input type='hidden' name='form-value' value='<?php echo $_smarty_tpl->tpl_vars['res_json']->value;?>
'/>


<script>
$(function(){
	$('.ace-file-input').addClass('col-sm-5');
	
	$('.bean-file').on('change', function(){
		$.common.ajaxUpload('index.php?a=adminDo&m=test', $(this).attr('name'));
	});
	
	
	
	var model = $('input[name=model]').val();
	var formval = $('input[name=form-value]').val();
	if(formval){
		formval = $.common.getJson(formval);
		$.each(formval, function(k, v){
			$('#' + model + "-form").find('[name=\'params['+k+']\']').val(v);
		});
		$('#' + model + "-form").find('[preview]').each(function(){
			var preview = $(this).attr('preview');
			$(this).attr('src', formval[preview]);
		});
	}
});
</script>

<script type="text/javascript">
	var editor = new UE.ui.Editor({initialFrameHeight:300, initialFrameWidth:650});
    editor.render("content");
    $(function(){
    	try {
			  $(".dropzone").dropzone({
			    paramName: "file", // The name that will be used to transfer the file
			    maxFilesize: 0.5, // MB
			  
				addRemoveLinks : true,
				dictDefaultMessage :
				'<span class="bigger-150 bolder"><i class="icon-caret-right red"></i> Drop files</span> to upload \
				<span class="smaller-80 grey">(or click)</span> <br /> \
				<i class="upload-icon icon-cloud-upload blue icon-3x"></i>'
				,
				dictResponseError: 'Error while uploading file!',
				//change the previewTemplate to use Bootstrap progress bars
				previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"></div>\n</div>",
				success: function(file, response){
					var data = $.common.getJson(response);
					var html = "<input type='hidden' name='pics[]' value='"+data.path+"' />"
					$('#pics').append(html);
					var template = $('#template').html();
					template = template.replace(RegExp('\\#path\\#','g'), data.path);
					$('#gallery').append(template);
					return file.previewElement.classList.add("dz-success");;
				}
			  });
		} catch(e) {
			  alert('Dropzone.js does not support older browsers!');
		}
		
		$('body').on('click', '.remove-pic', function(){
			var path = $(this).attr('data');
			$('[value=\''+path+'\']').remove();
			$(this).parents('li').remove();
		});
		
		var colorbox_params = {
				reposition:true,
				scalePhotos:true,
				scrolling:false,
				previous:'<i class="icon-arrow-left"></i>',
				next:'<i class="icon-arrow-right"></i>',
				close:'&times;',
				current:'{current} of {total}',
				maxWidth:'100%',
				maxHeight:'100%',
				onOpen:function(){
					document.body.style.overflow = 'hidden';
				},
				onClosed:function(){
					document.body.style.overflow = 'auto';
				},
				onComplete:function(){
					$.colorbox.resize();
				}
		};

		$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
		
    });
</script>

</body>
</html>

<?php }} ?>