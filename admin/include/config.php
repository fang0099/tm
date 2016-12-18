<?php
$config = array (
		'driver'=>'pdo',
		'dbms' => 'mysql',//you dbms
		'host' => 'localhost',
		'dbname' => 'tm',
		'user' => 'root',
		'pwd' => 'BeanMysql',
		'prefix' => '' ,
		'cache_config'=>array(
				"storage"   =>  "files",
				'path' => ROOT.'cache'
		),
		'url_mode'=>'queryMode',
		'url_separator'=>'/',
		'rewriter'=>array('.html','.htm','.shtml'),
		'web_root'=>'http://localhost/paperCheck/',
		'mail'=>'3191863669@qq.com',
		'mail_user'=>'3191863669@qq.com',
		'mail_pwd'=>'ccdqtc.com123',
		'mail_host'=>'smtp.qq.com'
);
?>