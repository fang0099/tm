<?php
require_once ROOT.'libs/smarty/Smarty.class.php';
class MySmarty extends Smarty {
	
	function __construct(){
		parent::__construct();
		$this->setTemplateDir(ROOT."templates");
		$this->setCompileDir(ROOT."compile");
		if(defined('DEBUG') && DEBUG){
			$this->caching = Smarty::CACHING_OFF;
		}else {
			$this->caching = Smarty::CACHING_LIFETIME_SAVED;
			$this->compile_check = false;
		}
	}
	
}

?>