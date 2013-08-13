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
	function &get($name, $default = null);

	/**
	 * @return static $this
	 */
	function set($name, $value);

	/**
	 * If the key is currently a non-array value it will be converted to an
	 * array  maintaning the previous value (along with the new one).
	 *
	 * @return static $this
	 */
	function add($name, $value);

	/**
	 * Convenient way to add multiple meta attributes in a single call.
	 *
	 * Roughly equivalent to calling foreach on $values and performing add.
	 *
	 * @return static $this
	 */
	function addmeta($name, $values = null);

	/**
	 * @return static $this
	 */
	function metadata_is(array $metadata = null);

	/**
	 * @return array
	 */
	function &metadata();

} # interface
