<?php

/**
 * Class ilHTTP
 *
 * @author  Fabian Schmid <fs@studer-raimann.ch>
 * @version 1.0.0
 */
class ilHTTP {

	/**
	 * @param $status
	 *
	 * @throws ilException
	 */
	public static function status($status) {
		if (!array_key_exists($status, self::$http_codes)) {
			throw new ilException('Wrong HTTP-Status Code');
		}
		if (function_exists('http_response_code')) {
			http_response_code($status);
		} else {
			self::httpResponseCode($status);
		}
	}


	/**
	 * @param $status
	 */
	private static function httpResponseCode($status) {
		$protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : self::PREFIX);
		$string = $protocol . ' ' . $status . ' ' . self::$http_codes[$status];
		$GLOBALS['http_response_code'] = $status;

		header($string, true, $status);
	}
}
