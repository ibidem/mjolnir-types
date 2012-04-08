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
interface Params
{
	/**
	 * @return mixed parameter or default 
	 */
	function get($key, $default = null);
	
	/**
	 * @param string key
	 * @param mixed value
	 * @return \ibidem\types\Params $this
	 */
	function set($key, $value);
	
	/**
	 * @param array associative array of key values
	 * @return \ibidem\types\Params $this
	 */
	function populate_params(array $params);
	
} # interface