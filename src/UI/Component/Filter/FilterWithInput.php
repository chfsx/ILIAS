<?php

/* Copyright (c) 2016 Fabian Schmid <fs@studer-raimann.ch> Extended GPL, see docs/LICENSE */
/* Copyright (c) 2016 Richard Klees <richard.klees@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Component\Filter;

/**
 * Bundles some filter items together to form a complete filter. This interface represents the state of the filter after an input has applied to.
 */
interface FilterWithInput extends Component {

	/**
	 * Convenience method for count($this->validationErrors()) == 0.
	 *
	 * @return bool
	 */
	public function hasValidContent();


	/**
	 * @throws \LogicException if !$this->hasValidContent()
	 * @return array
	 */
	public function content();


	/**
	 * @throws \LogicException if filter has not been validated
	 * @return string[]
	 */
	public function validationErrors();
}