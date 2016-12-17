$(function(){
	
	$('body').on('click', '[action=modal]',function(e){
		var params = $(this).attr('data');
		params = params.replace('<', '{');
		params = params.replace('>', '}');
		params = $.common.getJson(params);
		var target = params.target;
		var title = params.title;
		var id = params.id;
		var form = params.form;
		//解除form的绑定事件
		$(form).unbind();
		$(target).find('[role=modal-title]').html(title);
		if(id){
			var url = 'index.php?a=adminIndex&m=getData&model=' + params.model + "&id=" + id;
			$.ajax({
				url : url,
				dataType : 'json',
				type : 'POST',
				success : function(data){
					if(data){
						var obj = data;
						$.each(obj, function(k, v){
							try{
								$(form + ' [name=\''+k+'\']').val(v);
							}catch(e){}
							if($(form + ' [preview=\''+k+'\']')[0]){
								$(form + ' [preview=\''+k+'\']').attr('src', v);
							}
							if($(form + ' select[name=\''+k+'\']')[0]){
								if(v){
									var vs = v;
									try{
										vs = v.split(',');
										setTimeout(function(){
											for(var i = 0 ; i < vs.length ; i++){
												$(form + ' select[name=\''+k+'\']').find('[value='+vs[i]+']').attr('selected', true);
											}
										}, 100);
									}catch(e){
										$(form + ' select[name=\''+k+'\']').find('[value='+v+']').attr('selected', true);
									}
								}
							}
						});
					}else {
						alert('获取数据出错' + data.message);
					}
				}
			});
		}else {
			//$(form + ' [name]').val('');
			$(form)[0].reset();
			$(form + ' [name=\'params[id]\']').val('');
		}
		if(form != ''){
			var check = params.formcheck;
			if(!check){
				check = (function(){})();
			}
			var callback = params.formcallback;
			if(!callback){
				callback = function(data){
					if(data.status == 1){
						
						window.location.reload(true);
					}else {
						alert(data.message);
					}
				};
			}
			$(form).submit(function(){
				var options = {
					beforeSubmit : function(){
						eval(check);
					},
					type:'POST',
					success: function(data){
						if(callback instanceof Function){
							callback(data);
						}else {
							eval(callback);
						}
						if(data.status == 1){
							$(form)[0].reset();
						}
					},
					dataType : 'json'	
				};
				$(this).ajaxSubmit(options);
				return false;
			});
		}
		$(target).modal();
		e.stopPropagation();
	});
	
	
	$('body').on('click', '[action=batch-delete]', function(){
		var data = $(this).attr('data');
		data = data.replace('<', '{');
		data = data.replace('>', '}');
		data = $.common.getJson(data);
		var ids = "";
		$(data.target + ':checked').each(function(){
			ids += $(this).val() + ",";
		});
		if(ids == ""){
			alert('您没有选择任何记录');
			return;
		}
		if(confirm("确定删除选择的记录?")){
			var url = 'index.php?a=adminDo&m=batchDelete&ids=' + ids + '&model=' + data.model;
			$.ajax({
				url : url,
				dataType : 'json',
				success : function(data){
					window.location.reload(true);
				}
			});
		}
	});
	
	$('body').on('click', '[action=delete]', function(){
		var data = $(this).attr('data');
		data = data.replace('<', '{');
		data = data.replace('>', '}');
		data = $.common.getJson(data);
		var ids = data.id + ",";
		if(confirm("确定删除选择的记录?")){
			var url = 'index.php?a=adminDo&m=batchDelete&ids=' + ids + '&model=' + data.model;
			$.ajax({
				url : url,
				dataType : 'json',
				success : function(data){
					window.location.reload(true);
				}
			});
		}
	});
	
	$('select[rel]').change(function(){
		var rel = $(this).attr('rel');
		rel = getJson(rel);
		rels = [];
		if(!(rel instanceof Array)){
			rels.push(rel);
		}else {
			rels = rel;
		}
		for(var i = 0 ; i < rels.length ; i++){
			(function(rel, id){
				var rid = rel.rid;
				var url = rel.url;
				if(url){
					$.ajax({
						url : url + id,
						dataType : 'text',
						type : 'POST',
						success : function(data){
							if($(data).html() != ''){
								var def = $(rid).attr('default');
								var html = '';
								if(def){
									html += def;
								}
								html += $(data).html();
								$(rid).html(html);
							}else {
								var def = $(rid).attr('default');
								if(def){
									$(rid).html(def);
								}else{
									$(rid).html("<option value='-1'>无子选项</option>");
								}
							
							}
						}
					});
				}
			})(rels[i], $(this).val());
		}
	});
	
	$('[role=form]').submit(function(){
		var before = $(this).attr('before');
		var callback = $(this).attr('callback');
		var options = {
			beforeSubmit : function() {
				if(before){
					if($.common.hasFunction(before)){
						$.common.callFunction(before, window, data);
					}else {
						eval(before);
					}
				}
			},
			type : 'POST',
			success : function(data) {
				if($.common.hasFunction(callback)){
					$.common.callFunction(callback, window, data);
				}else {
					eval(callback);
				}
			},
			dataType : 'json'
		};
		$(this).ajaxSubmit(options);
		return false;
	});
	
	
	//$('.date').datepicker('option', $.fn.datepicker.dates['zh-CN']);
	//$.fn.datepicker.setDefaults($.fn.datepicker.dates['zh-CN']); 
	$('.date').datepicker({autoclose:true}).next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	/*
	$('.bean-file').ace_file_input({
		no_file:'没有选择文件 ...',
		btn_choose:'选择',
		btn_change:'重新选择',
		droppable:false,
		thumbnail:true, //| true | large
		//whitelist:'gif|png|jpg|jpeg'
		blacklist:'exe|php'
		//onchange:''
		//
	}).live('change', function(){
		//console.log($(this).data('ace_input_files'));
		$.common.ajaxUpload('index.php?a=adminDo&m=test', $(this).attr('name'));
	});
	*/
	//menu
	$('.nav-list').find('li').each(function(){
		$(this).removeClass('active');
	});
	var model = $.common.getQueryString('model');
	$('li[mdata='+model+']').addClass('active');
	var parent = $('li[mdata='+model+']').parent('ul.submenu');
	if(parent){
		parent.parent('li').addClass('active open');
	}
});

setTimeout(function(){
	inital();
}, 10);
function inital(){
	$('select[action=inital]').each(function(){
		var url = $(this).attr('url');
		var def = $(this).attr('default');
		var t = $(this);
		$.ajax({
			url : url,
			dataType : 'text',
			type : 'POST',
			success : function(data){
				var html = "";
				if(def){
					html += def;
				}
				html += $(data).html();
				t.html(html);
			}
		});
	});
	
}

function getJson(str){
	var obj;
	if($.parseJSON instanceof Function){
		try{
			obj = $.parseJSON(str);
		}catch(e){}
	}
	if(!obj){
		obj = eval("(" + str + ")"); 
	}
	return obj;
}


$.common = {
	getJson : window.getJson,
	StringToJson : function(str){
		var obj;
		if($.parseJSON instanceof Function){
			try{
				obj = $.parseJSON(str);
			}catch(e){}
		}
		if(!obj){
			obj = eval("(" + str + ")"); 
		}
		return obj;
	},
	JsonToString : function(json){
		var S = []; 
	    var J = ""; 
	    if (Object.prototype.toString.apply(json) === '[object Array]') { 
	        for (var i = 0; i < json.length; i++) 
	            S.push($.common.JsonToString(json[i])); 
	        J = '[' + S.join(',') + ']'; 
	    } 
	    else if (Object.prototype.toString.apply(json) === '[object Date]') { 
	        J = 'new Date(' + json.getTime() + ')'; 
	    } 
	    else if (Object.prototype.toString.apply(json) === '[object RegExp]' || Object.prototype.toString.apply(json) === '[object Function]') { 
	        J = json.toString(); 
	    } 
	    else if (Object.prototype.toString.apply(json) === '[object Object]') { 
	        for (var i in json) { 
	            json[i] = typeof (json[i]) == 'string' ? '"' + json[i] + '"' : (typeof (json[i]) === 'object' ? $.common.JsonToString(json[i]) : json[i]); 
	            S.push(i + ':' + json[i]); 
	        } 
	        J = '{' + S.join(',') + '}'; 
	    } 
	    return J; 
	},
	ajaxSubmit : function(data){
		if(!(data.before instanceof Function)){
			data.before = function(){
				;
			}
		}
		if(!(data.success instanceof Function)){
			data.success = function(data){
				;
			}
		}
		var options = {
				beforeSubmit : data.before,
				type:'POST',
				success: data.success,
				dataType : 'json'	
			};
		data.form.ajaxSubmit(options);
		return false;
	},
	fillHtml : function(data, template){
		//var html = template;
		var html = template;
		if(data instanceof Array){
			if(data.length > 0)
			for(var i = 0 ; i < data.length ; i++){
				data[i].index=i+1;
				if(i == 0){
					html = $.common.fillHtml(data[i], template);
				}else{
					html += $.common.fillHtml(data[i], template);
				}
			}else {
				html = "";
			}
		}else if(data instanceof Object){
			$.each(data, function(k, v){
				if(v == null){
					v = '';
				}
				html = html.replace(RegExp('\\#'+k+'\\#','g'), v);
			});
		} 
		else html="";
		return html;
	},
	callFunction : function(fun, context){
		if(!context){
			context = window;
		}
		var args = [].slice.call(arguments).splice(2);
		var namespaces = fun.split(".");
		var func = namespaces.pop();
		for(var i = 0; i < namespaces.length; i++) {
		  context = context[namespaces[i]];
		}
		return context[func].apply(this, args);
	},
	hasFunction : function(fun){
		if(!fun){
			return false;
		}
		var namespaces = fun.split(".");
		var context = window;
		for(var i = 0; i < namespaces.length; i++) {
			  context = context[namespaces[i]];
		}
		return context instanceof Function;
	},
	getQueryString : function(name){
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
		var r = window.location.search.substr(1).match(reg);
		if (r != null){ 
			return unescape(r[2]);
		} 
		return null;
	},
	ajaxUpload : function(url, element){
        $.ajaxFileUpload({
                  url: url, 
                  secureuri:false,
                  fileElementId: element,
                  dataType: 'text',
                  success: function (data){
                      var res = $.common.getJson(data);
                      $('[preview='+element+']').attr('src', res.path);
                      $('[name=\'params['+element+']\']').val(res.path);
                  }
        });
        return false;
    }
}



$.callback = {
		reload : function(data){
			if(data.status == 1){
				window.location.reload(true);
			}else {
				alert(data.message);
			}
		},
		stay : function(data){
			if(data.status == 1){
				alert('操作成功');
			}else {
				alert(data.message);
			}
		},
		back : function(){
			window.history.go(-1);
		}
}




