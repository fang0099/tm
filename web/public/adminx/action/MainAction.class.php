<?php
if(!defined('DENY')){
	exit();
}
class MainAction {
	
	public static function router() {
		$mode = C('url_mode');
		if($mode == 'queryMode'){
			self::queryMode();
		}else if ($mode == 'pathInfo'){
			self::pathInfo();
		}else {
			die('check your config');
		}
	}
	
	private static function parse(){
		$uri = $_SERVER['REQUEST_URI'];
		$path_info = $_SERVER['PATH_INFO'];
		$path_info = substr($path_info, 1);
		$parameters = explode(C('url_separator'), $path_info);
		for($i = 0 ; $i < count($parameters) ; ){
			$j = $i+1;
			$_GET[$parameters[$i]] = str_replace(C('rewriter'), '', $parameters[$j]);
			$i = $j+1;
		}
	}
	
	private static function queryMode(){
		$a = isset ( $_GET ['a'] ) ? $_GET ['a'] : 'index';
		if(ctype_alpha($a)){
			$a = ucfirst ( $a ) . "Action";
			if (class_exists($a)) {
				$action = new $a () ;
				$m = isset ( $_GET ['m'] ) ? $_GET ['m'] : 'index';
				if(ctype_alpha($m)){
					$action->$m ();
				}else {
					header("Content-Type:text/html;charset=utf-8");
					die('非法访问');
				}
			}else {
				header("Content-Type:text/html;charset=utf-8");
				die('非法访问');
			}
		}else {
			header("Content-Type:text/html;charset=utf-8");
			die('非法访问');
		}
	}
	private static function pathInfo(){
		self::parse();
		self::queryMode();
	}
}

?>