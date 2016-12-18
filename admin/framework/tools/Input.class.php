<?php
class Input extends Control {
	function __construct() {
	}
	
	public function render() {
		$html = "<input ";
		foreach ($this->attribute as $k => $v){
			$html .= $k . "='" . $v . "' ";
		} 
		$html .= " />";
		return $html;
	}
}

?>