<?php
/* Copyright (c) 2016 Fabian Schmid <fs@studer-raimann.ch> Extended GPL, see docs/LICENSE */
namespace ILIAS\HTTP\Cookies;

/**
 * Class Cookies
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class Cookies implements CookiesInterface {

	/**
	 * @inheritdoc
	 */
	public function set($name, $value = "", $expire = 0, $path = "", $domain = "", $secure = false, $httponly = false) {
		// TODO: Implement set() method.
	}


	/**
	 * @inheritdoc
	 */
	public function get($name) {
		// TODO: Implement get() method.
	}


	/**
	 * @inheritdoc
	 */
	public function exists($name) {
		// TODO: Implement exists() method.
	}


	/**
	 * @inheritdoc
	 */
	public function getAll() {
		// TODO: Implement getAll() method.
	}
}

