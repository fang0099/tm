<?php
session_start();
define ( "ROOT", str_replace ( "\\", "/", substr ( dirname ( __FILE__ ), 0, - 7 ) ) );
define ( "DEBUG", true );
define('DENY', false);
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set("Asia/Shanghai");
require ROOT.'include/config.php';
require ROOT.'include/function.php';
require ROOT.'libs/smarty/MySmarty.class.php';
require ROOT.'libs/phpfastcache/phpfastcache.php';
if (defined ( 'DEBUG' ) && DEBUG) {
	$start = microtime ( true );
	$classes = 0;
	error_reporting ( E_ALL );
} else {
	error_reporting ( 0 );
}

spl_autoload_register ( 'bean4T_autoload' );
set_error_handler('bean4T_error_handler');
$_GET = filter_param($_GET);
$_POST = filter_param($_POST);



