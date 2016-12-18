<?php
function smarty_modifier_make_money_size($money)
{
	if($money >= 1000 && $money < 10000){
		$o =  intval($money / 1000);
		$t = $money % 1000;
		if($t == 0){
			$t = '000';
		}
		return 		$o . ',' . $t;
	}else if ($money >= 10000){
		$o = smarty_modifier_make_money_size($money / 10000) . '万';
		$t = $money % 10000;
		$m ;
		if($t != 0){
			$m = $o . $t;
		}else {
			$m = $o;
		}
		return $m;
	}else {
		return $money;
	}
} 

?>