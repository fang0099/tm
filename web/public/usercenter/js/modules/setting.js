
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
                    if(data.success){
                        $parent.find('.input_profile_txt').html(value);
                        $parent.find('.input_profile').css('display', 'none');
                        $parent.find('.input_profile_txt').css('display', 'block');
                        $parent.find('.modify-btns').addClass('hide');
                        $parent.find('.js-modify').removeClass('hide');
                    }else {
                        global.reminder({message : data.message});
                    }

                }
            });
        });
    };
    
    exports.active = function(){
        render.renderMain(tplUrl, dataUrl, function(data){ return data}, function(){
        	bindEvent();
        });
    };
});