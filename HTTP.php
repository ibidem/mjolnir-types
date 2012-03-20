<?php namespace kohana4\types;

/** 
 * Common Language Interface
 * 
 * @package    Kohana4
 * @category   Types
 * @author     Kohana Team
 * @copyright  (c) 2008-2012 Kohana Team
 * @license    http://kohanaframework.org/license
 */
interface HTTP
{
	// status codes
	const STATUS = 'HTTP/1.1 200 OK';
	const STATUS_OK = 'HTTP/1.1 200 OK';
	const STATUS_NotFound = 'HTTP/1.1 404 Not Found';
	const STATUS_InternalServerError = 'HTTP/1.1 500 Internal Server Error';
	const STATUS_Forbidden = 'HTTP/1.1 403 Forbidden';
	// content-type
	const CONENT_TYPE = 'text/html';
	const CONENT_TYPE_HTML = 'text/html';
	const CONENT_TYPE_XHTML = 'application/xhtml+xml';
	
	/**
	 * @return string uri relative to current application
	 */
	static function detect_uri();
	
	/**
	 * @return string url base
	 */
	static function detect_url_base();
	
	/**
	 * Used to set content type. If you're trying to use XHTML for example, the
	 * content type (or at least the correct one) is not text/html :)
	 * 
	 * @param string content-type
	 * @return $this
	 */
	function content_type($content_type);
	
	/**
	 * @return string
	 */
	function get_content_type();
	
	/**
	 * @param string status 
	 * @return $this
	 */
	function status($status);
	
} # interface
