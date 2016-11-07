<?php
namespace ILIAS\Headers;

require_once('./Services/FileDelivery/interfaces/int.ilFileDeliveryHeaders.php');

/**
 * Class Headers
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class HTTPHeaders implements \ilFileDeliveryHeaders {

	const SEPARATOR = ':';


	/**
	 * @inheritdoc
	 */
	public function add($name, $value, $replace = true) {
		$name = str_replace(self::SEPARATOR, '', $name);
		$name = rtrim($name);

		header($name . self::SEPARATOR . $value);
	}


	/**
	 * @inheritdoc
	 */
	public function clear() {
		header_remove();
	}


	/**
	 * @inheritdoc
	 */
	public function get($name) {
		$headers = self::getAll();

		return $headers[$name];
	}


	/**
	 * @inheritdoc
	 */
	public function getAll() {
		return headers_list();
	}
}
