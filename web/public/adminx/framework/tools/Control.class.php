<?php
abstract class Control {
	
	function __construct() {
	}
	
	public $attribute = array();
	
	
	abstract public function render();
	
}

?>