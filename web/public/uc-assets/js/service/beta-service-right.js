/**************************************************
*
*	Project : Beta Front JS Project
*	Version : 1.0
* 	Module  : User Center Right Column
* 	Author  : Bean
* 	Contact : guhaibin1847@gmail.com
*
**************************************************/ 
__.service.right = __.service.right || {};


(function(){

	var tab = __.service.tab;
	var $rfollow = $('#r-follow');
	var $rfollowers = $('#r-follower');
	var $rsubscribe = $('#r-subscribe');
	var $rarticle = $('#r-article');
	var $rcollect = $('#r-collect');

	var bindClickEvent = function(){
		$rfollow.click(function(){
			$('#follow').click();	
		});

		$rfollowers.click(function(){
			$('#follow').click();
			$('#sub-followers').click();
		});

		$rsubscribe.click(function(){
			$('#subscribe').click();
		});

		$rarticle.click(function(){
			$('#article').click();
		});

		$rcollect.click(function(){
			$('#collect').click();
		});
	};

	__.service.right.init = function(){
		bindClickEvent();
	}

})();

$(document).ready(function(){
	__.service.right.init();
});