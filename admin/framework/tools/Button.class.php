<?php

class Button extends Control {
	function __construct() {
	}
	
	public $name;
	
	public function render() {
		$html = "<button ";
		foreach ($this->attribute as $key => $val){
			$html .= $key . "='" . $val . "' ";
		}
		$html .= ">" . $this->name . "</button>";
		return $html;
	}
}

?>