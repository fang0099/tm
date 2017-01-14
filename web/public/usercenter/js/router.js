define(function(require, exports, modules){


	var API_MAP = {
		"#index"		: require('modules/index'),
		"#activity"		: require('modules/activity'),
		"#article"		: require('modules/article'),
		"#collect"		: require('modules/collect'),
		"#subscribe"	: require('modules/subscribe'),
		"#follow"		: require('modules/follow'),
		"#notice"		: require('modules/notice'),
		"#setting"		: require('modules/setting')
	};

	var route = function(){
        var hash = location.hash;
        var module = API_MAP[hash];
        if(module){
            module.active();
        }else {
            API_MAP['#index'].active();
        }
        $('.second-link').each(function(k, v){
        	var $v = $(v);
        	if($v.attr('href') == 'index.php/uc' + hash){
        		$v.addClass('current');
			}else{
                $v.removeClass('current');
			}

        });
	}

	window.onhashchange = function(){
		route();
	};

	route();

});