<?php
class Utils {
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
	
}

?>