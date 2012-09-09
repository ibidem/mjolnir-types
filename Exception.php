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
interface Exception
{
	const NotFound = '\mjolnir\types\Exception::NotFound';
	const NotApplicable = '\mjolnir\types\Exception::NotApplicable';
	const NotAllowed = '\mjolnir\types\Exception::NotAllowed';
	
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
	 * @return \mjolnir\types\Exception $this
	 */
	function type($type);
	
	/**
	 * @return string
	 */
	function get_type();
	
	/**
	 * @param string message
	 * @return \mjolnir\types\Exception $this
	 */
	function set_message($message);
	
	/**
	 * @param string title
	 * @return \mjolnir\types\Exception $this
	 */
	function set_title($title = null);
	
	/**
	 * @param \Exception PHP exception 
	 * @return \mjolnir\types\Exception $this
	 */
	function based_on(\Exception $source);
	
} # interface