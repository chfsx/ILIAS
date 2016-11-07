<?php
namespace ILIAS\FileDelivery\FileDeliveryTypes;

require_once('./Services/FileDelivery/interfaces/int.ilFileDeliveryType.php');

/**
 * Class XSendfile
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class XSendfile implements \ilFileDeliveryType {

	/**
	 * @inheritdoc
	 */
	public function prepare($path_to_file) {
//		$this->clearHeaders();
//		$this->setDispositionHeaders();
		return true;
	}


	/**
	 * @inheritdoc
	 */
	public function deliver($path_to_file) {
		header('X-Sendfile: ' . realpath($path_to_file));

		return true;
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
		return true;
	}
}
