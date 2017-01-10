/*****************************************
*
* TM Project Slider Bar Component
* Author : Bean
* Contact : guhaibin1847@gmail.com
*
*****************************************/

__.components.sliderbar = __.components.sliderbar || {};

(function(){

	var $navlink = $('.sub-menu a.nav-link');

	var bind = function(){
		
		$navlink.click(function(e){
			$navlink.each(function(a){
				var $a = $($navlink[a]);
				$a.removeClass('active');
				$a.removeClass('open');
				$a.parent('li').removeClass('active');
				$a.parent('li').removeClass('open');
				//console.log($a.parents('a.nav-link'));
				$a.parents('li.nav-item').removeClass('active');
				$a.parents('li.nav-item').removeClass('open');
			});
			
			$(this).parent('li').addClass('active');
			$(this).parent('li').addClass('open');
			$(this).parent('li').addClass('start');
			$(this).addClass('active');
			$(this).addClass('open');
			$(this).addClass('start');
			$(this).parents('li.nav-item').addClass('active');
			$(this).parents('li.nav-item').addClass('open');
            __.utils.fixMainIframeSize();
		});
		
		$('a.link').click(function () {
			var url = $(this).attr('data');
			__.components.iframe.refreshMain(url);
        });

	};

	__.components.sliderbar.init = bind;
})();

