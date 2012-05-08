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
	function fetch($tag, $key, $default = null);
	
	/**
	 * @param string key
	 * @return \ibidem\types\Cache $this
	 */
	function delete($tag, $key = null);
	
	/**
	 * @param string key
	 * @param mixed data
	 * @param integer lifetime (seconds)
	 * @return \ibidem\types\Cache $this
	 */
	function store($tag, $key, $data, $lifetime_seconds = null);
	
} # interface