<?php

/* Copyright (c) 2016 Fabian Schmid <fs@studer-raimann.ch> Extended GPL, see docs/LICENSE */
/* Copyright (c) 2016 Richard Klees <richard.klees@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Component\Filter;

/**
 * Bundles some filter items together to form a complete filter.
 */
interface Filter extends Component {

	/**
	 * @param array|null $input defaults to $_POST
	 * @return FilterWithInput
	 */
	public function withInput(array $input = null);
}