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
interface Cache
{
	/**
	 * @param string key
	 * @param mixed default
	 * @return mixed
	 */
	function fetch($key, $default = null);
	
	/**
	 * @param string key
	 * @return $this
	 */
	function delete($key);
	
	/**
	 * @param string key
	 * @param mixed value
	 * @param integer time
	 * @return $this
	 */
	function store($key, $value, $time);
	
} # interface