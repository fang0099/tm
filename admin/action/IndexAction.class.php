<?php
class IndexAction extends Action{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->display('admin/login.html');
	}
	

}

?>