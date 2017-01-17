
define(function(require, exports, modules){

    var render = require('render');
    var global = require('global');
    var tplUrl = "usercenter/tpl/user-setting.tpl";
    var dataUrl = "/uc/info";
    var updateUserUrl = global.base + "/uc/update";

    var bindEvent = function () {
		$('.js-modify').click(function () {
			var $parent = $(this).parents('.form-part');
			$parent.find('.input_profile').fadeIn();
			$parent.find('.input_profile_txt').css('display', 'none');
			$parent.find('.modify-btns').removeClass('hide');
			$(this).addClass('hide');
        });
		$('.js-cancel').click(function(){
            var $parent = $(this).parents('.form-part');
            $parent.find('.input_profile').css('display', 'none');
            $parent.find('.input_profile_txt').css('display', 'block');
            $parent.find('.modify-btns').addClass('hide');
            $parent.find('.js-modify').removeClass('hide');
        });
		$('.js-save').click(function(){
            var $parent = $(this).parents('.form-part');
            var $input = $parent.find('.input_profile');
            var name = $input.attr('name');
            var value = $input.val();
            $.ajax({
                url : updateUserUrl,
                data : { name : name, value : value},
                dataType : 'json',
                type : 'post',
                success : function (data) {
                    if(data.success == 'success' || data.success == true){
                        $parent.find('.input_profile_txt').html(value);
                        $parent.find('.input_profile').css('display', 'none');
                        $parent.find('.input_profile_txt').css('display', 'block');
                        $parent.find('.modify-btns').addClass('hide');
                        $parent.find('.js-modify').removeClass('hide');
                    }else {
                        global.reminder({type : 'error', message : data.message});
                    }

                }
            });
        });
		var status = 1;
		$('.change-password_open').click(function(){
            if(status == 1){
                status = 0;
                var $input = $(this).parents('.form-part').find('.input_profile');
                $input.attr('disabled', false);
                $input.focus();
                $(this).html('保存');
                $(this).addClass('orange');
                $(this).removeClass('gray');
            }else {
                status = 1;
                var $input = $(this).parents('.form-part').find('.input_profile');
                var value = $input.val();
                if(value != '***'){
                    var name = $input.attr('name');
                    var value = $input.val();
                    $this = $(this);
                    $.ajax({
                        url : updateUserUrl,
                        data : { name : name, value : value},
                        dataType : 'json',
                        type : 'post',
                        success : function (data) {
                            if(data.success == 'success' || data.success == true){
                                $input.attr('disabled', true);
                                $this.html('修改');
                                $this.addClass('gray');
                                $this.removeClass('orange');
                            }else {
                                global.reminder({message : data.message});
                            }

                        }
                    });
                }else {
                    $input.attr('disabled', true);
                    $(this).html('修改');
                    $(this).addClass('gray');
                    $(this).removeClass('orange');
                }

            }

        });


        $('.change-avatar').click(function(){
            //$(this).popup('show');
            console.log('xx');
            $('#fileupload').click();
        });
    };



    // file upload
    require('vendor/jquery.iframe-transport');
    require('vendor/jquery.ui.widget');
    require('upload');
    //require('vendor/cropper.min');

    var uploadUrl = "index.php/uc/upload";
    var $ca = $('#change-avatar');
    $('#fileupload').fileupload({
        dataType: 'json',
        url : uploadUrl,
        add: function (e, data) {
            //console.log(data);
            //$ca.find('.process').removeClass('hide');
            $('.change-avatar').html('正在上传');
            data.submit();
        },
        done: function (e, data) {
            //console.log(data);
            if(data.result.success){
                $('.change-avatar').html('重新上传');
                var path = data.result.path;
                $.ajax({
                    url : updateUserUrl,
                    data : { name : "params[avatar]", value : path},
                    dataType : 'json',
                    type : 'post',
                    success : function (data) {
                        if(data.success == 'success' || data.success == true){
                            $('#user-setting-avatar').attr('src', path);
                            $('#user-avatar').find('img').attr('src', path);
                        }else {
                            global.reminder({message : data.message});
                        }
                    }
                });


                //$('.confirm-avatar').fadeIn();
                //$ca.find('.process').addClass('hide');
                //$ca.find('.upload-avatar').attr('src', data.result.path);
                //$ca.find('.reset_avatar').addClass('hide');
                /*
                 $ca.find('.edit-avatar').removeClass('hide);

                 $ca.find('.crop_img').cropper({
                 aspectRatio: 16 / 9,
                 crop: function(e) {
                 // Output the result data for cropping image.
                 console.log(e.x);
                 console.log(e.y);
                 console.log(e.width);
                 console.log(e.height);
                 console.log(e.rotate);
                 console.log(e.scaleX);
                 console.log(e.scaleY);
                 }
                 });
                 */
            }
        }
    });

    /*
    $('.confirm-avatar').click(function(){
        var src = $ca.find('.upload-avatar').attr('src');
        $('#user-setting-avatar').attr('src', src);
        $('#change-avatar').popup('hide');
    });

    $('.select-avatar-btn').click(function(){
        $('#fileupload').click();
    });
    $('.confirm-avatar').click(function(){
        var src = $('#change-avatar').find('.upload-avatar').attr('src');
        $('#user-setting-avatar').attr('src', src);
        $('#change-avatar').popup('hide');
    });
     */
    exports.active = function(){
        render.renderMain(tplUrl, dataUrl, function(data){ return data}, function(){
        	bindEvent();
        });
    };
});