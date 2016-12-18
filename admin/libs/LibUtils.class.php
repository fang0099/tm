<?php
class LibUtils {
	public static function getIp() {
		if (isset ( $_SERVER ["HTTP_CLIENT_IP"] )) {
			if (self::validip ( $_SERVER ["HTTP_CLIENT_IP"] )) {
				return $_SERVER ["HTTP_CLIENT_IP"];
			}
		}
		if (isset ( $_SERVER ["HTTP_X_FORWARDED_FOR"] )) {
			foreach ( explode ( ",", $_SERVER ["HTTP_X_FORWARDED_FOR"] ) as $ip ) {
				if (self::validip ( trim ( $ip ) )) {
					return $ip;
				}
			}
		}
		if (self::validip ( isset ( $_SERVER ["HTTP_X_FORWARDED"] ) ? $_SERVER ["HTTP_X_FORWARDED"] : '127.0.0.1' )) {
			return $_SERVER ["HTTP_X_FORWARDED"];
		} elseif (self::validip ( isset ( $_SERVER ["HTTP_FORWARDED_FOR"] ) ? $_SERVER ["HTTP_FORWARDED_FOR"] : '127.0.0.1' )) {
			return $_SERVER ["HTTP_FORWARDED_FOR"];
		} elseif (self::validip ( isset ( $_SERVER ["HTTP_FORWARDED"] ) ? $_SERVER ["HTTP_FORWARDED"] : '127.0.0.1' )) {
			return $_SERVER ["HTTP_FORWARDED"];
		} elseif (self::validip ( isset ( $_SERVER ["HTTP_X_FORWARDED"] ) ? $_SERVER ["HTTP_X_FORWARDED"] : '127.0.0.1' )) {
			return $_SERVER ["HTTP_X_FORWARDED"];
		} else {
			return $_SERVER ["REMOTE_ADDR"];
		}
	}
	public static function validip($ip) {
		if (! empty ( $ip ) && $ip == long2ip ( ip2long ( $ip ) )) {
			// reserved IANA IPv4 addresses
			// http://www.iana.org/assignments/ipv4-address-space
			$reserved_ips = array (
					array (
							'0.0.0.0',
							'2.255.255.255'
					),
					array (
							'10.0.0.0',
							'10.255.255.255'
					),
					array (
							'127.0.0.0',
							'127.255.255.255'
					),
					array (
							'169.254.0.0',
							'169.254.255.255'
					),
					array (
							'172.16.0.0',
							'172.31.255.255'
					),
					array (
							'192.0.2.0',
							'192.0.2.255'
					),
					array (
							'192.168.0.0',
							'192.168.255.255'
					),
					array (
							'255.255.255.0',
							'255.255.255.255'
					)
			);
				
			foreach ( $reserved_ips as $r ) {
				$min = ip2long ( $r [0] );
				$max = ip2long ( $r [1] );
				if ((ip2long ( $ip ) >= $min) && (ip2long ( $ip ) <= $max))
					return false;
			}
			return true;
		} else
			return false;
	}
	/**
	 * your util method
	 */	
	public static function getIPLocation($ip){
		$baseUrl = "http://ip.taobao.com/service/getIpInfo.php?ip=";
		$fetchUrl = $baseUrl . $ip;
		$res = file_get_contents($fetchUrl);
		$location = json_decode($res,true);
		if($location['code'] == '0'){
			return $location['data'];
		}else {
			return null;
		}
	}
	
	public static function generateRandomKey($length){
		$str = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
		$strLength = strlen($str);
		$randomStr = "";
		for($i = 0 ; $i < $length ; $i++){
			$random = rand(0, $strLength-1);
			$randomStr .= $str[$random];
		}
		return $randomStr;
	}
	
	public static function mail($to, $subject, $content){
		import('libs.phpmailer');
		import('libs.smtp');
		$mail = new PHPMailer;
		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = C('mail_host');  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = C('mail_user');                 // SMTP username
		$mail->Password = C('mail_pwd');                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		$mail->From = C('mail_user');
		$mail->FromName = '免费论文检测网站';
		$mail->addAddress($to, $to);     // Add a recipient
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $content;
		return $mail->send();
	}
	
	public static function checkEmail($email){
		$pregEmail = "/([a-z0-9]*[-_\.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?/i";
		return preg_match($pregEmail,$email);
	}
}

?>