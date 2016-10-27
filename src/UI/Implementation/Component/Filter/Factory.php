<?php

/* Copyright (c) 2016 Amstutz Timon <timon.amstutz@ilub.unibe.ch> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Filter;

use ILIAS\UI\Component\Filter as F;
use ILIAS\UI\Component\Filter\Filter;
use ILIAS\UI\Component\Filter\Item;
use ILIAS\UI\Implementation\Component\ComponentHelper;

/**
 * Class Factory
 *
 * @package ILIAS\UI\Implementation\Component\Filter
 */
class Factory implements F\Factory {

	use ComponentHelper;


	/**
	 * @inheritdoc
	 */
	public function filter(array $items) {
		// TODO: Implement filter() method.
	}


	/**
	 * @inheritdoc
	 */
	public function text($label, $defaults_to) {
		// TODO: Implement text() method.
	}


	/**
	 * @inheritdoc
	 */
	public function location($label, $defaults_to) {
		// TODO: Implement location() method.
	}
}