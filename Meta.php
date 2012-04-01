<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * @package    ibidem
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2008-2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
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