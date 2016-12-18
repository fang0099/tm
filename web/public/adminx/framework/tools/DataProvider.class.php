<?php
abstract class DataProvider {
	function __construct() {
	}
	
	public $param;
	
	abstract public function getData(); 
	
	
}

?>