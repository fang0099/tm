
var F = (function(){
	
	var makePagination = function(url, count, pageSize, currentPage){
		var allPage = Math.ceil(count / pageSize);
		var html = "";
		if(allPage > 1){
			var begin = currentPage - 4 > 0 ? currentPage - 4 : 1;
			var end = allPage - currentPage > 4 ? currentPage + 4 : allPage;
			for(var i = begin ; i <= end; i++){
				if(i == currentPage){
					html += '<li class="page current"><a>' + i + '</a></li>';
				}else {
					html += '<li class="page"><a href="'+ url +'/'+ i +'">'+ i +'</a></li>'
				}
			}	
		}
		return html;
	};

	var renderFollow = function(url, success, error){
        $.ajax({
            url : url,
            dataType : 'json',
            success : function(data){
                if(data.success == 'true' || data.success){
                	data.data = data.data || [];
                	for(var i = 0; i < data.data.length; i++){
						if(data.data[i].followed){
							data.data[i].class = 'unfollow hover';
							data.data[i].btn = '已关注'
						}else {
                            data.data[i].class = 'follow';
                            data.data[i].btn = '关注'
						}
					}
                    var html = Mustache.render($('#follow-li').html(), {data : data.data});
                    success(data, html);
                }else {
                    error(data.message);
                }
            }
        });
	}
	var getFollowsUrl = '/follows/';
	var renderFollows = function(uid, page, success, error){
		var url = getFollowsUrl + uid + '/' + page;
		renderFollow(url, success, error);
	};
	var renderFollowers = function(uid, page, success, error){
        var url = "/followers/" + uid + '/' + page;
        renderFollow(url, success, error);
	};

	return {
		'mp' : makePagination,
		'renderFollows' : renderFollows,
		'renderFollowers' : renderFollowers
	};

})();