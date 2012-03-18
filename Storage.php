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
interface Storage
{
	/**
	 * @param string group
	 */
	function group($group);
	
	/**
	 * @param mixed
	 */
	function fetch($key);
	
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
	function store($key, $value);
	
} # interface