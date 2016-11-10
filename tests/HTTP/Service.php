<?php
require_once("libs/composer/vendor/autoload.php");
use ILIAS\HTTP\Factory;

/**
 * Class HTTPMockService
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class HTTPMockService implements Factory {

	/**
	 * @inheritdoc
	 */
	public function cookies() {
		// TODO: Implement cookies() method.
	}


	/**
	 * @inheritdoc
	 */
	public function headers() {
		// TODO: Implement headers() method.
	}


	/**
	 * @inheritdoc
	 */
	public function status() {
		require_once('./tests/HTTP/Status/StatusMock.php');

		static $status;
		if (!$status) {
			$status = new StatusMock();
		}

		return $status;
	}
}
