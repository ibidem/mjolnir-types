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
interface Exception
{
	const NotFound = '\ibidem\types\Exception::NotFound';
	const NotApplicable = '\ibidem\types\Exception::NotApplicable';
	
	/**
	 * @return string message
	 */
	function message();
	
	/**
	 * @return string title
	 */
	function title();
	
	/**
	 * @param string exception type
	 * @return \ibidem\types\Exception $this
	 */
	function type($type);
	
	/**
	 * @return string
	 */
	function get_type();
	
	/**
	 * @param string message
	 * @return \ibidem\types\Exception $this
	 */
	function set_message($message);
	
	/**
	 * @param string title
	 * @return \ibidem\types\Exception $this
	 */
	function set_title($title = null);
	
	/**
	 * @param \Exception PHP exception 
	 * @return \ibidem\types\Exception $this
	 */
	function based_on(\Exception $source);
	
} # interface