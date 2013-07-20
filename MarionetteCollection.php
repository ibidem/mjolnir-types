<?php namespace mjolnir\types;

/**
 * PROTOTYPE - subject to change
 *
 * A MarionetteCollection is a model that's specifically designed to work well
 * with RESTful apis.
 *
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface MarionetteCollection extends Marionette
{
	/**
	 * Retrieve collection members.
	 *
	 * @return array
	 */
	function get(array $conf);

	/**
	 * Replace entire collection.
	 *
	 * @return static $this
	 */
	function put(array $collection);

	/**
	 * Create new entry in collection.
	 *
	 * @return array entry
	 */
	function post(array $entry);

	/**
	 * Empty collection.
	 *
	 * @return static $this
	 */
	function delete();

} # interface
