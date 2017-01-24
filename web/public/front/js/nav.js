$(function(){
	$(window).scroll(function(){
        var height = $(window).scrollTop();
        
        if(height > 50){
            $header = $('header.p-header');
            $header.addClass('p-header-hide');
            $header.removeClass('p-header-show');
            $nav = $('div.second-nav');
            $nav.removeClass('second-nav-large');
            $nav.addClass('second-nav-small');
        }else {
            $header = $('header.p-header');
            $header.removeClass('p-header-hide');
            $header.addClass('p-header-show');
            $nav = $('div.second-nav');
            $nav.removeClass('second-nav-small');
            $nav.addClass('second-nav-large');
        }
    });
});