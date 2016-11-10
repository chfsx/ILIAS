<?php
namespace ILIAS\FileDelivery\FileDeliveryTypes;

use ILIAS\HTTP\Headers\HeadersInterface as Headers;

require_once('./Services/FileDelivery/interfaces/int.ilFileDeliveryType.php');

/**
 * Class XAccel
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class XAccel implements \ilFileDeliveryType {

	const DATA = 'data';
	const SECURED_DATA = 'secured-data';


	/**
	 * @inheritdoc
	 */
	public function prepare($path_to_file, Headers $headers) {
		$headers->clear();
		$headers->add(\ilFileDeliveryHeaders::CONTENT_TYPE, '');

		return true;
	}


	/**
	 * @inheritdoc
	 */
	public function deliver($path_to_file, Headers $headers) {
		if (strpos($path_to_file, './' . self::DATA . '/') === 0) {
			$path_to_file = str_replace('./' . self::DATA . '/', '/' . self::SECURED_DATA . '/', $path_to_file);
		}

		header('X-Accel-Redirect: ' . ($path_to_file));
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
