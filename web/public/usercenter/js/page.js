define(function(require, exports, modules){
    require('popup');
    var $userAvatar = $('#user-avatar');
    var $userNav = $('#user-nav');

    $('.second-link').click(function(){
        $('.second-link').each(function(k, v){
            $(v).removeClass('current');
        });
        $(this).addClass('current');
    });

    $userAvatar.click(function(){
        if($userNav.hasClass('visible')){
            $userNav.removeClass('visible');
        }else {
            $userNav.addClass('visible');
        }
    });

    $userNav.find('a').click(function(){
        var href = $(this).attr('href');
        $('.second-link').each(function(k, v){
            var $v = $(v);
            if($v.attr('href') == href){
                $v.addClass('current');
            }else {
                $v.removeClass('current');
            }
        });
        $userNav.removeClass('visible');
    });
    $('.pp').popup({
        color: 'white',
        opacity: 1,
        transition: '0.3s',
        scrolllock: true
    });

});