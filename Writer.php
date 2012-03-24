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
interface Writer
{
	/**
	 * @return $this
	 */
	function eol();
	
	/**
	 * @return string EOL as string
	 */
	function eol_string();
	
	/**
	 * @param string text
	 * @return $this
	 */
	function write($text, $indent = 0, $nowrap_hint = null);
	
	/**
	 * @param $args
	 * @return $this
	 */
	function writef($args);
	
	/**
	 * @param string title
	 * @return $this
	 */
	function header($title);
	
	/**
	 * @param string title
	 * @return $this
	 */
	function subheader($title);
	
	/**
	 * @param string term
	 * @param string definition
	 * @param int indent hint
	 * @param string no wrap hint string
	 * @return $this
	 */
	public function listwrite($dt, $dd, $indent_hint = null, $nowrap_hint = null);
		
	/**
	 * [!!] Must NEVER be used to convey functionality! 
	 * 
	 * If text is highlighted, then it should only to help make it easier to 
	 * convey the message not as a means of conveying the message. There is no 
	 * gurantee the writer will actually use the highlighting; or even knows of
	 * the provided highlighting hint. A log writer for example can't write to
	 * a plain/text file in color, so if messages are doubled to a log then
	 * messages that rely on color, bold, or underlines to convey the message 
	 * become unreadable garbage text.
	 * 
	 * @param string text
	 * @param string highlight key
	 * @return $this
	 */
	function highlight($text, $highlight = null);

	/**
	 * @param string text
	 * @return $this
	 */
	function status($status, $text);
	
	/**
	 * @param string text
	 * @return $this
	 */
	function error($text);
	
} # interface
