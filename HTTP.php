<?php namespace mjolnir\types;

/** 
 * Common Language Interface
 * 
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface HTTP
{
	// the name to be used in layers implementing the interface; the reason you
	// wouldn't just use say "\mjolnir\types\HTTP" is beause any implementation
	// could implement multiple HTTP interfaces, not just the \mjolnir\types one
	const LAYER_NAME = 'http';
	
	// methods
	const POST = 'POST';
	const GET = 'GET';
	
	// status codes
	const STATUS = 'HTTP/1.1 200 OK';
	const STATUS_OK = 'HTTP/1.1 200 OK';
	const STATUS_NotFound = 'HTTP/1.1 404 Not Found';
	const STATUS_InternalServerError = 'HTTP/1.1 500 Internal Server Error';
	const STATUS_Forbidden = 'HTTP/1.1 403 Forbidden';
	// content-type
	const CONTENT_TYPE = 'text/html';
	const CONTENT_TYPE_HTML = 'text/html';
	const CONTENT_TYPE_XHTML = 'application/xhtml+xml';
		
	/**
	 * Used to set content type. If you're trying to use XHTML for example, the
	 * content type (or at least the correct one) is not text/html :)
	 * 
	 * @param string content-type
	 * @return \mjolnir\types\HTTP $this
	 */
	function content_type($content_type);
	
	/**
	 * @return string
	 */
	function get_content_type();
	
	/**
	 * @param string status 
	 * @return \mjolnir\types\HTTP $this
	 */
	function status($status);
	
} # interface
