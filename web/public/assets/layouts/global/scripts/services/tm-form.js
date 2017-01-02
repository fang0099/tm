/*****************************************
*
* TM Project Form Service
* Author : Bean
* Contact : guhaibin1847@gmail.com
*
*****************************************/

__.services.form = __.services.form || {};


(function(){
	var utils = __.utils;
	var iframe = __.components.iframe;
	var $form = $('#form');
	var $cancle = $('.cancle');
	var jsonData = $('#json-data').val();

	var initFormValue = function(){
		if(jsonData){
			var json = JSON.parse(jsonData);
			console.log(json);
            var $selects = $('select');
            if($selects && $selects.length > 0){
                for (var i = 0 ; i < $selects.length; i++){
                    var $select = $($selects[i]);
                    var name = $select.attr('name');
                    name = name.replace('params[', '');
                    name = name.replace(']', '');
                    console.log(name + "," + json[name]);
                    $select.val(json[name]);
                }
            }
		}
	};

	var init = function(){
		// bind form
		$form.submit(function(before, success){
			var option = {
				beforeSubmit : function(){
					// call before
					return true;
				},
				dataType : 'json',
				success : function(data){
					if(data.success == 'true'){
						var callback = $form.attr('callback');
						if(callback){
							if(__.utils.callback[callback]){
                                __.utils.callback[callback]();
							}else {
								window[callback]();
							}
						}else {
                            iframe.outRefreshMain();
						}
					}else {
						alert(data.message);
					}
				}
			}
			$(this).ajaxSubmit(option);
			return false;
		});	
		// bind cancle
		$cancle.click(function(){
			iframe.outCloseRightSlider();
		});


        // file upload
		var fileUploadUrl = "upload";
        $('input.ajax').change(function () {
        	console.log('upload file');
        	var name = $(this).attr('name');
            $.ajaxFileUpload({
                url: fileUploadUrl,
                secureuri:false,
                fileElementId: name,
                dataType: 'json',
                success: function (data){
                	if(data.success){
                		var path =  data.path;
                        $('img[preview='+name+']').attr('src', path);
                        $('[name=\'params['+name+']\']').val(data.path);
					}else {
                		alert('upload error');
                		console.log(data);
					}

                }
            });
            return false;
        });

        initFormValue();

	};

	__.services.form.init = init;
})();

$(document).ready(function(){
    $('[select-type=ajax]').each(function(k, v){
        var url = $(v).attr('url');
        var $this = $(v);
        $.ajax({
            type : 'GET',
            url : url,
            dataType : 'json',
            success : function (data) {
                var html = "";
                for(var i = 0; i < data.length ; i++){
                    html += "<option value='" + data[i].value + "'>" + data[i].key + "</option>";
                }
                $this.html(html);
            }
        });
    });
    __.services.form.init();
});