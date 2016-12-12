<?php
class LibLogUtils {
	
	private static $traceLog = array();
	private static $tags = array();
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
	public static function rememberLog($log,$tag='...'){
		self::$traceLog[date("Y-m-d G:i:s")][] = array($tag,$log);
		self::$tags[$tag] = 1;
	}
	
	/**
	 * 打印调试信息
	 * @author Bean
	 */
	public static function showRememberLog(){
		echo "<style>";
		echo ".label, .badge {
				    background-color: #0088CC;
				    color: #FFFFFF;
				    display: inline-block;
				    font-size: 11.844px;
				    font-weight: bold;
				    line-height: 14px;
				    border-radius: 5px;
				    margin: 5px;
				    padding-bottom: 8px;
				    padding-top: 8px;
				    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
				    vertical-align: baseline;
				    white-space: nowrap;
				}";
		echo "</style>";
		echo '<div>';
			echo "<span class='label'>All</span>";
		foreach (self::$tags as $k=>$log){
			echo "<span class='label'>".$k."</span>";
		}
		echo '</div>';
		echo '<table border=1>';
		echo '<thead>';
		echo '<tr class=head>';
		echo '<th width=\'170\'>';
		echo '执行时间';
		echo '</th>';
		echo '<th>';
		echo 'Tag';
		echo '</th>';
		echo '<th>';
		echo '备注';
		echo '</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach (self::$traceLog as $k=>$log)
		{
			foreach ($log as $l){
				echo "<tr class='$l[0]'>";
				echo '<td>';
				echo $k;
				echo '</td>';
				echo '<td>';
				echo $l[0];
				echo '</td>';
				echo '<td>';
				echo $l[1];
				echo '</td>';
			}
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
		echo '<script>';
		echo "$(document).ready(function(){
			$('.label').click(function(){
				var c = $(this).html();
				if(c=='All'){
					$('tr').css('display','');
				}else{
					var select = \".\"+c+\"\";
					$('tr').css('display','none');
					$('tr.head').css('display','');
					$(select).css('display','');
				}
			});
		});";
		echo '</script>';
	}
	
}
?>