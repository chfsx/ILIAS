<?php
/* Copyright (c) 2016 Fabian Schmid <fs@studer-raimann.ch> Extended GPL, see docs/LICENSE */
namespace ILIAS\HTTP\Session;

/**
 * Interface SessionInterface
 *
 * @package ILIAS\HTTP
 */
interface SessionInterface {

	/**
	 * Get session data from table
	 *
	 * According to https://bugs.php.net/bug.php?id=70520 read data must return a string.
	 * Otherwise session_regenerate_id might fail with php 7.
	 *
	 * @param    string        session id
	 * @return    string        session data
	 */
	static function _getData($a_session_id);


	/**
	 * Lookup expire time for a specific session
	 *
	 * @global ilDB $ilDB
	 * @param string $a_session_id
	 * @return int expired unix timestamp
	 */
	public static function lookupExpireTime($a_session_id);


	/**
	 * Write session data
	 *
	 * @param    string        session id
	 * @param    string        session data
	 */
	static function _writeData($a_session_id, $a_data);


	/**
	 * Check whether session exists
	 *
	 * @param    string        session id
	 * @return    boolean        true, if session id exists
	 */
	static function _exists($a_session_id);


	/**
	 * Destroy session
	 *
	 * @param    string|array session   id|s
	 * @param    int                    closing context
	 * @param    int|bool expired       at timestamp
	 */
	static function _destroy($a_session_id, $a_closing_context = null, $a_expired_at = null);


	/**
	 * Destroy session
	 *
	 * @param    string        session id
	 */
	static function _destroyByUserId($a_user_id);


	/**
	 * Destroy expired sessions
	 */
	static function _destroyExpiredSessions();


	/**
	 * Duplicate session
	 *
	 * @param    string        session id
	 * @return    string        new session id
	 */
	static function _duplicate($a_session_id);


	/**
	 *
	 * Returns the expiration timestamp in seconds
	 *
	 * @param    boolean    If passed, the value for fixed session is returned
	 * @return    integer    The expiration timestamp in seconds
	 * @access    public
	 * @static
	 *
	 */
	public static function getExpireValue($fixedMode = false);


	/**
	 *
	 * Returns the idle time in seconds
	 *
	 * @param    boolean    If passed, the value for fixed session is returned
	 * @return    integer    The idle time in seconds
	 * @access    public
	 * @static
	 *
	 */
	public static function getIdleValue($fixedMode = false);


	/**
	 *
	 * Returns the session expiration value
	 *
	 * @return integer    The expiration value in seconds
	 * @access    public
	 * @static
	 *
	 */
	public static function getSessionExpireValue();


	/**
	 * Get the active users with a specific remote ip address
	 *
	 * @param    string    ip address
	 * @return    array    list of active user id
	 */
	static function _getUsersWithIp($a_ip);


	/**
	 * Set a value
	 *
	 * @param
	 * @return
	 */
	static function set($a_var, $a_val);


	/**
	 * Get a value
	 *
	 * @param
	 * @return
	 */
	static function get($a_var);


	/**
	 * Unset a value
	 *
	 * @param
	 * @return
	 */
	static function clear($a_var);


	/**
	 * set closing context (for statistics)
	 *
	 * @param int $a_context
	 */
	public static function setClosingContext($a_context);


	/**
	 * get closing context (for statistics)
	 *
	 * @return int
	 */
	public static function getClosingContext();


	/**
	 * @return boolean
	 */
	public static function isWebAccessWithoutSessionEnabled();


	/**
	 * @param boolean $enable_web_access_without_session
	 */
	public static function enableWebAccessWithoutSession($enable_web_access_without_session);
}
