
var F = (function(){
	
	var makePagination = function(url, count, pageSize, currentPage){
		var allPage = Math.ceil(count / pageSize);
		var html = "";
		if(allPage > 1){
			var begin = currentPage - 4 > 0 ? currentPage - 4 : 1;
			var end = allPage - currentPage > 4 ? currentPage + 4 : allPage;
			for(var i = begin ; i < end; i++){
				if(i == currentPage){
					html += '<li class="page current"><a>' + i + '</a></li>';
				}else {
					html += '<li class="page"><a href="'+ url +'/'+ i +'">'+ i +'</a></li>'
				}
			}	
		}
		return html;
	};


	return {
		'mp' : makePagination
	};

})();