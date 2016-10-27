<?php

/* Copyright (c) 2016 Fabian Schmid <fs@studer-raimann.ch> Extended GPL, see docs/LICENSE */
/* Copyright (c) 2016 Richard Klees <richard.klees@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Component\Filter;

/**
 * Factory for Filters.
 */
interface Factory extends \ILIAS\UI\Component\Component {

	/**
	 * TODO: add UI Kitchensink-Info
	 * TODO: maybe we need some more parameters here.
	 *
	 * @param   Item[] $items
	 * @return  Filter
	 */
	public function filter(array $items);


	/**
	 * TODO: add UI Kitchensink-Info
	 *
	 * @param string $label
	 * @param string $defaults_to Default value displayed in the item.
	 * @return  Item  // TODO: maybe this needs to be more specific
	 */
	public function text($label, $defaults_to);


	/**
	 * TODO: add UI Kitchensink-Info
	 *
	 * @param string $label
	 * @param array $defaults_to [$latitude, $longitude]  // This is to keep this interface in sync with Item::withDefault
	 * @return  Item  // TODO: maybe this needs to be more specific
	 */
	public function location($label, $defaults_to);
}