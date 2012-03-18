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
interface Exception
{
	const NotFound = 'NotFound';
	const NotApplicable = 'NotApplicable';
	
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
	 * @return $this
	 */
	function type($type);
	
	/**
	 * @return string
	 */
	function get_type();
	
	/**
	 * @param string message
	 * @return $this 
	 */
	function set_message($message);
	
	/**
	 * @param string title
	 * @return $this 
	 */
	function set_title($title = null);
	
	/**
	 * @param \Exception PHP exception 
	 * @return $this
	 */
	function based_on(\Exception $source);
	
} # interface