/**************************************************
 *
 *	Project : Beta Front JS Project
 *	Version : 1.0
 * 	Module  : Base Utils Form
 * 	Author  : Bean
 * 	Contact : guhaibin1847@gmail.com
 *
 **************************************************/
__.utils.form = __.utils.form || {};

(function(){

    var bind = function(selector){
        var $form = $(selector);
        
        if(!$form[0]){
            return;
        }
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
                        alert('success');
                    }else {
                        alert(data.message);
                    }
                }
            }
            $(this).ajaxSubmit(option);
            return false;
        });
    };

    __.utils.form.bind = bind;
})();