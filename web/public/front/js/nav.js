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
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

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
                        toastr.error(data.message);
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
                        toastr.error(data.message);
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
                        toastr.error(data.message);
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
                        toastr.error(data.message);
                    }
                }
            });
        }
    };
    $subscribe.click(function(){
        toggleSubscribe($(this));
    });

    $('.pp').popup({
        color: 'white',
        opacity: 1,
        transition: '0.3s',
        scrolllock: true
    });

    $('.close-btn').click(function(){
        $('body').click();
    });



    var $follows = $('#follows-pop');

    $('.num-follows').click(function(){
        F.renderFollows(_.id, 1, function(data, html){
            $follows.find('.r-author-list').html(html);
            if(data.length == 10){
                $follows.find('.load-more').removeClass('hide');
            }else {
                $follows.find('.load-more').addClass('hide');
            }
            $follows.popup('show');
        }, function(message){
            toastr.error(message);
        });

    });
    var $followers = $('#followers-pop');

    $('.num-fans').click(function(){
        F.renderFollowers(_.id, 1, function(data, html){
            $followers.find('.r-author-list').html(html);
            if(data.length == 10){
                $followers.find('.load-more').removeClass('hide');
            }else {
                $followers.find('.load-more').addClass('hide');
            }
            $followers.popup('show');
        }, function(message){
            toastr.error(message);
        });

    });

    $('.follows-more').click(function () {
        var $page = $('#follows-page');
        var page = $page.val() + 1;
        F.renderFollows(_.id, page, function(data, html){
            $follows.find('.r-author-list').append(html);
            if(data.length == 10){
                $follows.find('.load-more').removeClass('hide');
            }else {
                $follows.find('.load-more').addClass('hide');
            }
            $page.val(page);
        }, function(message){
            toastr.error(message);
        });
    });
    $('.followers-more').click(function () {
        var $page = $('#followers-page');
        var page = $page.val() + 1;
        F.renderFollows(_.id, page, function(data, html){
            $followers.find('.r-author-list').append(html);
            if(data.length == 10){
                $followers.find('.load-more').removeClass('hide');
            }else {
                $followers.find('.load-more').addClass('hide');
            }
            $page.val(page);
        }, function(message){
            toastr.error(message);
        });
    });

    $('.r-author-list').on('click', '.follows-btn', function(e){
        var $this = $(this);
        var id = $this.attr('data');
        if($this.hasClass('follow')){
            // follow
            $.ajax({
                url : '/user/follow_ajax?id=' + id,
                dataType : 'json',
                success : function(data){
                    if(data.success  || data.success == 'true'){
                        $this.removeClass('follow');
                        $this.addClass('unfollow');
                        $this.addClass('hover');
                        $this.html('已关注');
                    }else {
                        // login first
                        toastr.error(data.message);
                    }
                }
            });
        }else {
            $.ajax({
                url : '/user/unfollow_ajax?id=' + id,
                dataType : 'json',
                success : function(data){
                    if(data.success  || data.success == 'true'){
                        $this.removeClass('hover');
                        $this.removeClass('unfollow');
                        $this.addClass('follow');
                        $this.html('关注');
                    }else {
                        // login first
                        toastr.error(data.message);
                    }
                }
            });
        }
    });
});