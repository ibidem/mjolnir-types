<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Protocol
{
	/**
	 * @return static $this
	 */
	function relays(array $relays);

	/**
	 * @return static $this
	 */
	function attrs(array $attributes);

	/**
	 * Constraints rule to only users who are NOT the owners of said object.
	 *
	 * @return static $this
	 */
	function only_others();

	/**
	 * Constraints rule to only users who are the owners of said object.
	 *
	 * @return static $this
	 */
	function only_owner();

	/**
	 * Resets constraint on ownership back to everybody.
	 *
	 * @return static $this
	 */
	function everybody();

	/**
	 * true = only owner of object
	 * false = everyone but owner of object
	 * null = everyone
	 *
	 * @return boolean|null
	 */
	function selfcontrol();

	/**
	 * @return static $this
	 */
	function allow($name, array $values);

	/**
	 * Grant unrestricted access to the given relays. ie. all parameters are
	 * allowed.
	 *
	 * @return static $this
	 */
	function unrestricted();

	/**
	 * Relays are relays or routes, context is an array of values required for
	 * the match, among these values "owner" is a special idenfication value.
	 *
	 * For inpage elements you must provide attribute restrictions. An attribute
	 * is an element on the page.
	 *
	 * @return boolean
	 */
	function matches($relay, array $context = null, $attribute = null);

} # interface
