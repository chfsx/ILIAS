<?php
namespace ILIAS\FileDelivery\FileDeliveryTypes;

use ILIAS\HTTP\Headers\HeadersInterface as Headers;

require_once('./Services/FileDelivery/interfaces/int.ilFileDeliveryType.php');

/**
 * Class Virtual
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class Virtual implements \ilFileDeliveryType {

	const DATA = 'data';
	const VIRTUAL_DATA = 'virtual-data';


	/**
	 * @inheritdoc
	 */
	public function prepare($path_to_file, Headers $headers) {
		// $this->clearHeaders();
		return true;
	}


	/**
	 * @inheritdoc
	 */
	public function deliver($path_to_file, Headers $headers) {
		header('Content-type:');
		if (strpos($path_to_file, './' . self::DATA . '/') === 0 && is_dir('./' . self::VIRTUAL_DATA)) {
			$path_to_file = str_replace('./' . self::DATA . '/', '/' . self::VIRTUAL_DATA . '/', $path_to_file);
		}
		virtual($path_to_file);
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
