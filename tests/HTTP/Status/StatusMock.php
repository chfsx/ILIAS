<?php
use ILIAS\HTTP\Status\StatusInterface;
use ILIAS\HTTP\Status\StatusException;

/**
 * Class StatusMock
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
class StatusMock implements StatusInterface {

	/**
	 * @var null
	 */
	protected $sent_status = StatusInterface::HTTP_OK;


	/**
	 * @inheritdoc
	 */
	public function send($code) {
		if ($code !== StatusInterface::HTTP_OK && $this->sent_status !== StatusInterface::HTTP_OK) {
			throw new StatusException('HTTP-Status-Code already sent');
		}
		$this->sent_status = $code;
	}


	/**
	 * @inheritdoc
	 */
	public function get() {
		return ($this->sent_status === null ? StatusInterface::HTTP_OK : $this->sent_status);
	}


	public function clear() {
		$this->sent_status = StatusInterface::HTTP_OK;
	}
}
