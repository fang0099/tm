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
    var $userAvatar = $('#user-avatar');
    var $userNav = $('#user-nav');
    $userAvatar.click(function(){
        if($userNav.hasClass('visible')){
            $userNav.removeClass('visible');
        }else {
            $userNav.addClass('visible');
        }
    });


    // follow
    var $follow = $('.js-follow');
    var $fansNum = $('.fans-num');
    var toggleFollow = function($this){
        var id = $this.attr('data-id');
        if($this.hasClass('follow')){
            // follow
            $.ajax({
                url : '/user/follow_ajax?id=' + id,
                dataType : 'json',
                success : function(data){
                    if(data.success  || data.success == 'true'){
                        $follow.each(function(k, v){
                            var $this = $(v);
                            $this.removeClass('follow');
                            $this.addClass('unfollow');
                            $this.addClass('hover');
                            $span = $this.find('span');
                            if($span[0]){
                                $span.html('取消关注');
                            }else {
                                $this.html('取消关注');
                            }
                        });
                        var fans = $fansNum.html();
                        $fansNum.html(parseInt(fans) + 1);
                    }else {
                        // login first
                    }
                }
            });
        }else {
            $.ajax({
                url : '/user/unfollow_ajax?id=' + id,
                dataType : 'json',
                success : function(data){
                    if(data.success  || data.success == 'true'){
                        $follow.each(function(k, v){
                            var $this = $(v);
                            $this.removeClass('hover');
                            $this.removeClass('unfollow');
                            $this.addClass('follow');
                            $span = $this.find('span');
                            if($span[0]){
                                $span.html('关注');
                            }else {
                                $this.html('关注');
                            }
                        });
                        var fans = $fansNum.html();
                        $fansNum.html(parseInt(fans) - 1);
                    }else {
                        // login first
                    }
                }
            });
        }
    };
    $follow.click(function(){
        toggleFollow($(this));
    });

    // subscribe
    var $subscribe = $('.js-subscribe');
    var $subscribeNUm = $('.subscriber-num');
    var toggleSubscribe = function($this){
        var id = $this.attr('data-id');
        if($this.hasClass('subscribe')){
            // follow
            $.ajax({
                url : '/tag/subscribe_ajax?id=' + id,
                dataType : 'json',
                success : function(data){
                    if(data.success  || data.success == 'true'){
                        $subscribe.each(function(k, v){
                            var $this = $(v);
                            $this.removeClass('subscribe');
                            $this.addClass('unsubscribe');
                            $this.addClass('hover');
                            $span = $this.find('span');
                            if($span[0]){
                                $span.html('取消订阅');
                            }else {
                                $this.html('取消订阅');
                            }
                        });
                        var fans = $subscribeNUm.html();
                        $subscribeNUm.html(parseInt(fans) + 1);
                    }else {
                        // login first
                    }
                }
            });
        }else {
            $.ajax({
                url : '/tag/unsubscribe_ajax?id=' + id,
                dataType : 'json',
                success : function(data){
                    if(data.success  || data.success == 'true'){
                        $subscribe.each(function(k, v){
                            var $this = $(v);
                            $this.removeClass('hover');
                            $this.removeClass('unsubscribe');
                            $this.addClass('subscribe');
                            $span = $this.find('span');
                            if($span[0]){
                                $span.html('订阅');
                            }else {
                                $this.html('订阅');
                            }
                        });
                        var fans = $subscribeNUm.html();
                        $subscribeNUm.html(parseInt(fans) - 1);
                    }else {
                        // login first
                    }
                }
            });
        }
    };
    $subscribe.click(function(){
        toggleSubscribe($(this));
    });
});