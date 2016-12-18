<?php
function bean4T_autoload($class_name) {
	global $classes;
	if (strpos ( $class_name, "Action" ) != false || $class_name == 'Action') {
		require (ROOT . "action/" . $class_name . ".class.php") ;
	} else if (strpos ( $class_name, "Model" ) != false || $class_name == 'Model') {
		require (ROOT . 'model/' . $class_name . ".class.php") ;
	}  else if (strpos($class_name, "Lib") !== false && strpos($class_name, "Lib") == 0 ){
		require (ROOT . 'libs/' . $class_name . ".class.php") ;
	} else {
		require (ROOT.'framework/tools/' . $class_name . ".class.php");
	}
	$classes ++;
	LibLogUtils::rememberLog($class_name,"Load_Class");
}

function filter_param($param){
	foreach($param as $k=>$v){
		if(is_string($v)){
			$v = str_replace("script","scrip*t",$v);
			$param[$k] = addslashes($v);
		}else if(is_array($v)){
			$param[$k] = filter_param($v);
		}
	}
	return $param;
}

function C($key){
	global $config;
	return $config[$key];
}

function trace_info(){
	global $start,$classes;
	if(defined("DEBUG") && DEBUG){
		$end = microtime(true);
		echo "<hr><h3>Running info:</h3>";
		echo "Running time:",(($end-$start)*1000).'ms<br/>';
		echo "Load <b>$classes</b> Classes<br/>";
		LibLogUtils::showRememberLog();
	}
}

function bean4T_print_r($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function bean4T_error_handler(){
	$trace = debug_backtrace();
	$log = @"Error:".LibUtils::getIp()."=>".@$trace[0]['file']."=>line:".@$trace[0]['line']."=>".@$trace[0]['args'][1];
	LibLogUtils::writeLog($log);
}

function unescape($str){
	if(get_magic_quotes_gpc()){
		return stripslashes(stripslashes($str));
	}else {
		return stripslashes($str);
	}
}

/**
 *
 * 导入文件
 * @param string $path
 * @param bool or string $ext
 * @param string $baseUrl
 * @return mixed
 */
function import($path, $ext = true, $baseUrl = ROOT)
{
	$file = $baseUrl . str_replace ( '.', '/', $path );
	$file .= (is_bool ( $ext ) ? ($ext ? '.class.php' : '.php') : $ext);
	$file = realpath ( $file );
	static $f_cache = array();
	$env_name = "IMPORT_{$file}";
	if(!isset($f_cache[$env_name]))
	{
		if(is_file($file))
		{
			$f_cache[$env_name] = require ($file);
		}
		else
		{
			return false;
		}
	}
	return $f_cache[$env_name];
}