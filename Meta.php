<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Meta
{
	/**
	 * @return mixed
	 */
	function get($name, $default = null);

	/**
	 * @return static $this
	 */
	function set($name, $value);

	/**
	 * @return static $this
	 */
	function add($name, $value);

	/**
	 * @return static $this
	 */
	function metadata_is(array $metadata = null);

	/**
	 * @return array
	 */
	function metadata();

} # interface
