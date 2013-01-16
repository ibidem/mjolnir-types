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
interface Meta
{
	/**
	 * Set metainformation.
	 * 
	 * @param string key
	 * @param mixed value
	 * @return \mjolnir\types\Meta $this
	 */
	function meta($key, $value);
	
	/**
	 * @param string key
	 * @param mixed default
	 * @return mixed meta value for key, or default
	 */
	function get_meta($key, $default = null);
	
} # interface