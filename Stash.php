<?php namespace mjolnir\types;

/**
 * The Stash interface provides the minimal support a basic caching system
 * should implement.
 *
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Stash
{
	# The stash is responsible for serializing the data. It is asssumed only
	# serializable data is passed into a stash.

	/**
	 * Store a value under a key for a certain number of seconds.
	 */
	function set($key, $data, $expires = null);

	/**
	 * Retrieves data from $key
	 *
	 * @return mixed data or default
	 */
	function get($key, $default = null);

	/**
	 * Deletes $key
	 */
	function delete($key);

	/**
	 * Wipes the cache.
	 */
	function flush();

} # interface
