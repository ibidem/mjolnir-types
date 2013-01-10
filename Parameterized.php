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
interface Parameterized # stable
{
	/**
	 * @return mixed parameter or default
	 */
	function get($key, $default = null);

	/**
	 * @param string key
	 * @param mixed value
	 * @return static $this
	 */
	function set($key, $value);

	/**
	 * @param array associative array of key values
	 * @return static $this
	 */
	function params_array(array $params);

	/**
	 * @return array
	 */
	function paramsarray();

} # interface