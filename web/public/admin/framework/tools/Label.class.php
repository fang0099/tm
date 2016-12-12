<?php
class Label extends Control {
	function __construct() {
	}
	
	public $name;
	
	public function render() {
		$label = "<label ";
		foreach ($this->attribute as $key => $val){
			$label .= $key . "='" . $val . "' ";
		}
		$label .= ">" . $this->name . "</label>";
		return $label;
	}

	
	
}

?>