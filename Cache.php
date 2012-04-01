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