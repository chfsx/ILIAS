<?php
namespace ILIAS\FileDelivery\FileDeliveryTypes;

require_once('./Services/FileDelivery/interfaces/int.ilFileDeliveryType.php');

/**
 * Class PHP
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class PHP implements \ilFileDeliveryType {

	/**
	 * @var resource
	 */
	protected $file;


	/**
	 * @inheritdoc
	 */
	public function prepare($path_to_file) {
		set_time_limit(0);
		$this->file = fopen(($path_to_file), "rb");
	}


	/**
	 * @inheritdoc
	 */
	public function deliver($path_to_file) {
		fpassthru($this->file);
	}


	/**
	 * @inheritdoc
	 */
	public function supportsInlineDelivery() {
		return true;
	}


	/**
	 * @inheritdoc
	 */
	public function supportsAttachmentDelivery() {
		return true;
	}


	/**
	 * @inheritdoc
	 */
	public function supportsStreaming() {
		return false;
	}
}
