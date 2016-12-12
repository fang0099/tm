<?php

class ArrayDataProvider extends DataProvider {
	function __construct() {
	}
	
	public function getData() {
		$data = $this->param;
		$res = array();
		foreach ($data as $d){
			foreach ($d as $k=>$v){
				$res[$v] = $k;
			}
		}
		return $res;
	}
}

?>