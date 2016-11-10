<?php
/* Copyright (c) 2016 Fabian Schmid <fs@studer-raimann.ch> Extended GPL, see docs/LICENSE */
namespace ILIAS\HTTP\Cookies;

/**
 * Interface CookiesInterface
 *
 * @package ILIAS\HTTP\Cookies
 */
interface CookiesInterface {

	/**
	 * @param $name
	 * @param string $value
	 * @param int $expire
	 * @param string $path
	 * @param string $domain
	 * @param bool $secure
	 * @param bool $httponly
	 * @return bool
	 */
	public function set($name, $value = "", $expire = 0, $path = "", $domain = "", $secure = false, $httponly = false);


	/**
	 * @param $name
	 * @return mixed
	 */
	public function get($name);


	/**
	 * @param $name
	 * @return bool
	 */
	public function exists($name);


	/**
	 * @return array
	 */
	public function getAll();
}