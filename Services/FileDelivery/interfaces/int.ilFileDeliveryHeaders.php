<?php

/**
 * Interface ilFileDeliveryHeaders
 *
 * @author Fabian Schmid <fs@studer-raimann.ch>
 */
interface ilFileDeliveryHeaders {

	const ACCEPT_RANGES = 'Accept-Ranges';
	const CACHE_CONTROL = 'Cache-Control';
	const CONNECTION = "Connection";
	const CONTENT_DESCRIPTION = 'Content-Description';
	const CONTENT_DISPOSITION = 'Content-Disposition';
	const CONTENT_LENGTH = "Content-Length";
	const CONTENT_TYPE = 'Content-type';
	const E_TAG = 'ETag';
	const LAST_MODIFIED = 'Last-Modified';
	const PRAGMA = 'Pragma';


	/**
	 * @param $name    string HTTP-Header-Name, e.g. "Last-Modified"
	 * @param $value   string It's value, e.g. "Wed, 15 Nov 1995 04:58:08 GMT"
	 * @param $replace bool replace existing value
	 */
	public function add($name, $value, $replace = true);


	/**
	 * Clears all Headers
	 *
	 * @return bool
	 */
	public function clear();


	/**
	 * @param $name string Header-Name, e.g. "Last-Modified"
	 * @return string|null Header-Value, e.g. "Wed, 15 Nov 1995 04:58:08 GMT". Returns null if header is not set
	 */
	public function get($name);


	/**
	 * @return array ['Header-Name One' => 'Header-Value One', 'Header-Name Two' => 'Header-Value Two', ... ]
	 */
	public function getAll();
}
