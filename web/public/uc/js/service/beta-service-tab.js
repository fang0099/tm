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
	var contentTemplate = $('#list-content').html();
	var portraitTemplate = $('#list-portrait').html();
	var userTemplate = $('#list-user').html();
	var base = "http://localhost/tm/web/public/index.php";
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
			var url = base + $(this).attr('data');
			var page = $(this).attr('page');
			url += '/' + page;
            console.log(url);
			$.getJSON(url, function(data){
				var html = '';
				if(data.success){
					var d = data.data;
					console.log(d);
					for (var i = 0 ; i < d.length; i++){
						if(d[i].type){
                            if(d[i].type == 0){
                                html += te.renderByTemplate(contentTemplate, d[i]);
                            }else if(d[i].type == 1){
                                html += te.renderByTemplate(portraitTemplate, d[i]);
                            }else if(d[i].type == 3){
                                html += te.renderByTemplate(userTemplate, d[i]);
                            }
						}else {

						}

						//console.log(html);
					}
				}else {
					html = te.renderById('empty', {});
				}
				$listBody.html(html);
			});
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