
define(function(require, exports, modules){
	var render = require('render');
    var tplUrl = "usercenter/tpl/user-activity.tpl";
    var dataUrl = "/uc/activities";
	var emptyHtml = $.ajax({
		url : "usercenter/tpl/user-empty-activity.tpl",
		async : false
    }).responseText;

	exports.active = function(){
        render.renderMain(tplUrl, dataUrl, function(data){
        	var dd = [];
        	if(data.data instanceof Array && data.data.length > 0){
        		for(var i = 0 ; i < data.data.length ; i++){
        			var d = data.data[i];
					if(d.ref.id != undefined){
                        if(d.type == 1){
                            // tag
							d.reft = d.ref.name;
							d.reflink = "/article/list?type=tag&id=" + d.ref.id;
							d.refat = "";
                        }else if(d.type === 2){
                            // article
							d.reft = d.ref.title;
							d.reflink = "/article?id=" + d.ref.id;
							d.refat = d.ref.abstracts;
                        }else if(d.type == 3){
                            // user
							d.reft = d.ref.username;
							d.reflink = "/article/list?id=" + d.ref.id;
							d.refat = "";
                        }else if(d.type == 4){
							// comment
                        }
                        dd.push(d);
					}

				}
			}
			return {'data' : dd};
		},function(){
        }, emptyHtml);
	};
});