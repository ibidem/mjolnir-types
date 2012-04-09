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
	 * @return \ibidem\types\Cache $this
	 */
	function delete($key);
	
	/**
	 * @param string key
	 * @param mixed data
	 * @param integer time
	 * @return \ibidem\types\Cache $this
	 */
	function store($key, $data, $lifetime = null);
	
} # interface