<?php
/* Copyright (c) 2016 Fabian Schmid <fs@studer-raimann.ch> Extended GPL, see docs/LICENSE */
namespace ILIAS\HTTP\Headers;

/**
 * Class Headers
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class Headers implements HeadersInterface {

	const SEPARATOR = ':';
	/**
	 * @var array
	 */
	protected $sent_headers = array();
	/**
	 * @var array
	 */
	protected $header_stack = array();


	/**
	 * @inheritdoc
	 */
	public function add($name, $value, $replace = true) {
		$name = str_replace(self::SEPARATOR, '', $name);
		$name = rtrim($name);
		if ($replace) {
			$this->header_stack[$name] = $value;
		} else {
			if (!isset($this->header_stack[$name])) {
				$this->header_stack[$name] = $value;
			}
		}
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


	/**
	 * @inheritdoc
	 */
	public function send($name, $value, $replace = true) {
		$this->add($name, $value, true);
		$this->sendViaPHP($name, $value, $replace);
	}


	public function sendAll() {
		foreach ($this->header_stack as $name => $value) {
			$this->sendViaPHP($name, $value, true);
		}
	}


	/**
	 * @param $name
	 * @param $value
	 * @param $replace
	 */
	protected function sendViaPHP($name, $value, $replace) {
		$this->sent_headers[$name] = $value;
		header($name . self::SEPARATOR . $value, $replace);
	}
}
