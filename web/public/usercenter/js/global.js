/**************************************************
*
*	Project : Beta Front JS Project
*	Version : 1.0
* 	Module  : User Center Global
* 	Author  : Bean
* 	Contact : guhaibin1847@gmail.com
*
**************************************************/ 
define(function(require, exports, module){
    //var base = "http://localhost/tm/web/public/index.php";
    var base = "";
    exports.base = base;

    exports.reminder = function(option){
        alert(option.message);
    }
});