<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * @package    ibidem
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Writer
{
	/**
	 * @return \ibidem\types\Writer $this
	 */
	function eol();
	
	/**
	 * @return string EOL as string
	 */
	function eol_string();
	
	/**
	 * @param string text
	 * @return \ibidem\types\Writer $this
	 */
	function write($text, $indent = 0, $nowrap_hint = null);
	
	/**
	 * @param $args
	 * @return \ibidem\types\Writer $this
	 */
	function writef($args);
	
	/**
	 * @param string title
	 * @return \ibidem\types\Writer $this
	 */
	function header($title);
	
	/**
	 * @param string title
	 * @return \ibidem\types\Writer $this
	 */
	function subheader($title);
	
	/**
	 * @param string term
	 * @param string definition
	 * @param int indent hint
	 * @param string no wrap hint string
	 * @return \ibidem\types\Writer $this
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
	 * @return \ibidem\types\Writer $this
	 */
	function highlight($text, $highlight = null);

	/**
	 * @param string text
	 * @return \ibidem\types\Writer $this
	 */
	function status($status, $text);
	
	/**
	 * @param string text
	 * @return \ibidem\types\Writer $this
	 */
	function error($text);
	
} # interface
