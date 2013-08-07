<?php namespace mjolnir\types;

/**
 * PROTOTYPE - subject to change
 *
 * A Marionette is a model that's specifically designed to work though a object
 * based process.
 *
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Marionette extends Puppet
{
	/**
	 * @return string table with database prefix
	 */
	static function table();

	/**
	 * @return array marionette configuration
	 */
	static function config();

	/**
	 * @return string
	 */
	static function keyfield();

	// --- Reference Helpers --------------------------------------------------

	/**
	 * @return \mjolnir\types\MarionetteCollection corresponding to this marionette
	 */
	function collection();

	/**
	 * @return \mjolnir\types\MarionetteModel corresponding to this marionette
	 */
	function model();

	// --- Security -----------------------------------------------------------

	/**
	 * Sets a set of conditions that are REQUIRED by all operations; this is to
	 * say that any get, put, patch, delete must be done with the given set of
	 * conditions, eg. assuming you've added the usergroup functionality in
	 * your application you would use [ 'usergroup' => \app\Auth::usergroup() ]
	 * so that usergroups have isolated entries.
	 *
	 * The conditions will overwrite any conditions placed on requests and will
	 * be interpreted using `SQL::parseconstraints`.
	 *
	 * `null` may be passed to remove the conditions. Re-calling the method will
	 * merge over existing filters.
	 *
	 * @return static $this
	 */
	function filter($conditions); # intentionally not using `array`

} # interface
