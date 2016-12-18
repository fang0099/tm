<?php

class TextArea extends Control {
	function __construct() {
	}
	
	
	public function render() {
		$textArea = "<textarea ";
		foreach ($this->attribute as $key => $value){
			$textArea .= $key . "='" . $value . "' ";
		}
		$textArea .= "></textarea>";
		return $textArea;
	}
}

?>