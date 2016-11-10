<?php
/* Copyright (c) 2016 Fabian Schmid <fs@studer-raimann.ch> Extended GPL, see docs/LICENSE */
namespace ILIAS\HTTP;

/**
 * Interface Factory
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
interface Factory {

	/**
	 * @return \ILIAS\HTTP\Cookies\CookiesInterface
	 */
	public function cookies();


	/**
	 * @return \ILIAS\HTTP\Headers\HeadersInterface
	 */
	public function headers();


	/**
	 * @return \ILIAS\HTTP\Status\StatusInterface
	 */
	public function status();
}
