<?php
/* Copyright (c) 2016 Fabian Schmid <fs@studer-raimann.ch> Extended GPL, see docs/LICENSE */
namespace ILIAS\HTTP\Headers;

/**
 * Interface HeadersInterface
 *
 * @package ILIAS\HTTP\Headers
 */
interface HeadersInterface {

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
	 * Adds a header to the Stack
	 *
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
	 * Sends a header directly and ads it to the stack
	 *
	 * @param $name    string HTTP-Header-Name, e.g. "Last-Modified"
	 * @param $value   string It's value, e.g. "Wed, 15 Nov 1995 04:58:08 GMT"
	 * @return bool
	 */
	public function send($name, $value);


	/**
	 * @return array ['Header-Name One' => 'Header-Value One', 'Header-Name Two' => 'Header-Value Two', ... ]
	 */
	public function getAll();


	/**
	 * @return bool if headers where sent or not
	 */
	public function sendAll();
}