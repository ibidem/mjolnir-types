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
interface Params
{
	/**
	 * @return mixed parameter or default 
	 */
	function get($key, $default = null);
	
	/**
	 * @param string key
	 * @param mixed value
	 * @return \kohana4\types\Params
	 */
	function set($key, $value);
	
	/**
	 * @param array associative array of key values
	 * @return \kohana4\types\Params
	 */
	function populate_params(array $params);
	
} # interface