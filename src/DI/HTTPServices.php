<?php
/* Copyright (c) 2016 Richard Klees <richard.klees@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\DI;

use ILIAS\HTTP\Factory;

/**
 * Provides fluid interface to HTTP services.
 */
class HTTPServices implements Factory {

	/**
	 * @var    Container
	 */
	protected $container;


	/**
	 * HTTPServices constructor.
	 *
	 * @param \ILIAS\DI\Container $container
	 */
	public function __construct(Container $container) {
		$this->container = $container;
	}


	/**
	 * @return \ILIAS\HTTP\Cookies\CookiesInterface
	 */
	public function cookies() {
		return $this->container["http.cookies"];
	}


	/**
	 * @return \ILIAS\HTTP\Headers\HeadersInterface
	 */
	public function headers() {
		return $this->container["http.headers"];
	}


	/**
	 * @return \ILIAS\HTTP\Status\StatusInterface
	 */
	public function status() {
		return $this->container["http.status"];
	}
}
