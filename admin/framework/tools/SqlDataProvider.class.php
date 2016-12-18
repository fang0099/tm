<?php

class SqlDataProvider extends DataProvider {
	function __construct() {
	}
	
	public function getData() {
		$m = new Model();
		$data = $m->select($this->param);
		$map = array();
		foreach ($data as $d){
			$map[$d['key']] = $d['value'];
		}
		return $map;
	}
}

?>