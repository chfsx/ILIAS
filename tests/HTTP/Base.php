<?php

/* Copyright (c) 2016 Fabian Schmid <fs@studer-raimann.ch> Extended GPL, see docs/LICENSE */

require_once("libs/composer/vendor/autoload.php");
require_once(__DIR__ . "/../../Services/Language/classes/class.ilLanguage.php");

/**
 * Class ilLanguageMock
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class ilLanguageMock extends \ilLanguage {

	public $requested = array();


	public function __construct() { }


	/**
	 * @param $a_topic
	 * @param string $a_default_lang_fallback_mod
	 * @return mixed
	 */
	public function txt($a_topic, $a_default_lang_fallback_mod = "") {
		$this->requested[] = $a_topic;

		return $a_topic;
	}
}

/**
 * Class ILIAS_HTTP_TestBase
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
abstract class ILIAS_HTTP_TestBase extends PHPUnit_Framework_TestCase {

	public function setUp() {
		assert_options(ASSERT_WARNING, 0);
		assert_options(ASSERT_CALLBACK, null);
	}


	public function tearDown() {
		assert_options(ASSERT_WARNING, 1);
		assert_options(ASSERT_CALLBACK, null);
	}


	/**
	 * @return ILIAS\HTTP\Factory
	 */
	public function getServices() {
		require_once('./tests/HTTP/Service.php');

		return new HTTPMockService();
	}


	public function getLanguage() {
		return new ilLanguageMock();
	}
}
