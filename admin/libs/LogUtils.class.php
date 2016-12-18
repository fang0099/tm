<?php
class LogUtils {
	
	private static $traceLog = array();

	/**
	 * 写入log
	 * @param string $log
	 * @author Bean
	 */
	public static function writeLog($log){
		$logFilePath = ROOT."logfiles/".date("Y-m-d").".txt";
		if(!file_exists($logFilePath)){
			touch($logFilePath);
		}
		$fw = fopen($logFilePath,'a');
		$log = str_replace('\r\n','',$log);
		fwrite($fw, date("Y-m-d G:i:s").":".$log."\r\n");
		fclose($fw);
	}
	
	/**
	 * 记录运行信息
	 * @param string $log
	 * @author Bean
	 */
	public static function rememberLog($log){
		self::$traceLog[date("Y-m-d G:i:s")."<>".rand(0, 10000)] = $log;
	}
	
	/**
	 * 打印调试信息
	 * @author Bean
	 */
	public static function showRememberLog(){
		echo "<pre>";
		print_r(self::$traceLog);
		echo "</pre>";
	}
	
}

?>