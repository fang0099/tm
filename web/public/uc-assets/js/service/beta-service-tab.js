/**************************************************
*
*	Project : Beta Front JS Project
*	Version : 1.0
* 	Module  : User Center Tab
* 	Author  : Bean
* 	Contact : guhaibin1847@gmail.com
*
**************************************************/ 

__.service.tab = __.service.tab || {};

(function(){
	var utils = __.utils;
	var te = utils.TE;
	var $tabs = $('a.Tabs-link');
	var $listHeader = $('#list-header');
	var $listBody = $('#list-body-content');
	//var $selectBtn = $('#select-file-btn');

	var contentTemplate = $('#list-content').html();
	var portraitTemplate = $('#list-portrait').html();
	var userTemplate = $('#list-user').html();
	var noticeTemplate = $('#list-notice').html();
	var tagTemplate = $('#list-tags').html();
	var articleTemplate = $('#list-article').html();
	var followUserTemplate = $('#list-follow-user').html();
	var settingTemplate = $('#user-form-tpl').html();

	var loading = $('#list-loading').html();
	//var base = "http://localhost/tm/web/public/index.php";
    var base = "";

    var loadData = function(url, page){
    	if(page != undefined)
    		url += '/' + page;
    	console.log(url);
    	// begin loading
        $listBody.html(loading);

		$.getJSON(url, function(data){
			var html = '';
			var isUserForm = false;
			if(data.success){
				var d = data.data;
				console.log(d);
				for (var i = 0 ; i < d.length; i++){
					if(d[i].type != undefined && d[i].type >= 0 && (d[i].ref_id != undefined)){
                        if(d[i].type == 0){
                            html += te.renderByTemplate(contentTemplate, d[i]);
                        }else if(d[i].type == 1){
                            html += te.renderByTemplate(portraitTemplate, d[i]);
                        }else if(d[i].type == 3){
                            html += te.renderByTemplate(userTemplate, d[i]);
                        }
					}else {
						if(page == undefined){
							html += te.renderByTemplate(settingTemplate, d[i]);
                            isUserForm = true;
						}else if(d[i].fans_num != undefined){
                            html += te.renderByTemplate(tagTemplate, d[i]);
						}else if(d[i].username != undefined){
							html += te.renderByTemplate(followUserTemplate, d[i]);
						}else if(d[i].hot_num != undefined){
							html += te.renderByTemplate(articleTemplate, d[i]);
						}else{
                            html += te.renderByTemplate(noticeTemplate, d[i]);
						}

					}
				}

			}
            if(html == ''){
                html = te.renderById('empty', {});
            }
			$listBody.html(html);
			if(isUserForm){
				__.utils.form.bind('#user-form');
				bindAvatarAjaxUpload();	
				bindAjaxSubmit();
			}else {

			}
		});
    };

    var uploadUrl = "index.php/uc/upload";
    var bindAvatarAjaxUpload = function(){
    	$("#avatar-file").fileupload({
	        dataType: 'json',
	        url : uploadUrl,
	        add: function (e, data) {
	            //console.log(data);
	            $('#select-file-btn').html('正在上传 ... ');
	            $('#select-file-btn').attr('disabled', true);
	            data.submit();
	        },
	        done: function (e, data) {
	        	//console.log(data);
	        	if(data.result.success){
	        		$('#select-file-btn').html('上传完成');	
	        		$('#avatar-img').attr('src', data.result.path);
	        		$('#avatar-input').val(data.result.path);
	        	}
	        	
	        	$('#select-file-btn').attr('disabled', false);
	        	
	        }
	    });	
	    bindSelectBtnEvent();
    };

    var bindAjaxSubmit = function(){
    	var url = '/uc/updateinfo';
    	$('#user-info-submit').click(function(){
    		var formData = {};
    		$('.user-form-data').each(function(k, v){
    			var $v = $(v);
    			var name = $v.attr('name');
    			var val = $v.val();
    			formData[name] = val;
    		});
    		console.log(formData);
    		$.ajax({
    			url : url,
    			data : formData,
    			type : 'post',
    			dataType : 'json',
    			success : function(data){
    				console.log(data);	
    			}
    		});
    	});
    }


    var bindSelectBtnEvent = function(){
    	$('#select-file-btn').click(function(){
    		$('#avatar-file').click();
    	});
    }

	var bindTabLinkEvent = function(){
		$tabs.click(function(){
			
			// remove active class
			$tabs.each(function(k, v){
				$(v).removeClass('is-active');
			});
			// add current active class
			$(this).addClass('is-active');
			//show list header
			var data = $(this).attr('data');
			data = utils.getJson(data);
			var header = data.header;

			var html = te.renderById(header, {});
			$listHeader.html(html);
			// click header first link
			$listHeader.find('a.is-active').click();
		});	
	};

	var bindListHeaderEvent = function(){
		$listHeader.on('click', 'a.SubTabs-item', function(){
			// add current class to identify which link is current click
			$(this).addClass('current');
			// remove is-active
			$listHeader.find('a.SubTabs-item').each(function (k, v) {
				$(v).removeClass('is-active');
            });
			// add current link is-active class
			$(this).addClass('is-active');
			var data = $(this).attr('data');
			var url = base + data;
			var page = $(this).attr('page');
			loadData(url, page);

		});
	};


	__.service.tab.init = function(){
		bindTabLinkEvent();
		bindListHeaderEvent();
		//click first 
		$('.tab-list').find('a.Tabs-link').first().click();
	}


})();


$(document).ready(function(){
	__.service.tab.init();
});