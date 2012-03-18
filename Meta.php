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
interface Meta
{
	/**
	 * Set metainformation.
	 * 
	 * @param string key
	 * @param mixed value
	 * @return $this
	 */
	function meta($key, $value);
	
	/**
	 * @param string key
	 * @param mixed default
	 * @return mixed meta value for key, or default
	 */
	function get_meta($key, $default = null);
	
} # interface