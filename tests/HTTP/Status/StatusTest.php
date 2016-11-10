<?php

require_once(__DIR__ . "/../../../libs/composer/vendor/autoload.php");
require_once(__DIR__ . "/../Base.php");

use \ILIAS\HTTP\Status\StatusInterface as S;
use \ILIAS\HTTP\Status\StatusException as SE;

/**
 * Class StatusTest
 *
 * Test HTTP Status Handling
 */
class StatusTest extends ILIAS_HTTP_TestBase {

	public function test_no_cose_set() {
		$h = $this->getServices();

		$this->assertEquals($h->status()->get(), 200);
	}


	public function test_set_code() {
		$h = $this->getServices();
		$h->status()->send(S::HTTP_ACCEPTED);
		$this->assertEquals($h->status()->get(), 202);
	}


	public function test_set_multiple_codes() {
		$h = $this->getServices();
		$h->status()->clear();
		$h->status()->send(S::HTTP_ACCEPTED);
		try {
			$h->status()->send(S::HTTP_BAD_GATEWAY);
			$this->assertFalse(true);
		} catch (Exception $e) {
			$this->assertEquals($e->getMessage(), 'HTTP-Status-Code already sent');
		}
	}
}
