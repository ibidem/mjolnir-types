<?php namespace mjolnir\types;

/**
 * A Versioned object is one where the current version of the implementation or
 * some other detail of the object is important for it's usage. For example
 * versioning information is very important in the paradox migration system
 * since the same migration may run with two totally different versions of the
 * system which may be relevant in the future, such as in tracking bugs and
 * inconsistencies.
 *
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Versioned
{
	/**
	 * This method returns an array of relevant components and their version
	 * at the time. The object itself may return multiple versions and
	 * components by itself, representing different modules overwriting the
	 * method.
	 *
	 * @return array
	 */
	function versioninfo();

	/**
	 * Core version information.
	 *
	 * @return array
	 */
	static function coreversion();

} # interface
