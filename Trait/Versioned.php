<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Versioned
{
	/**
	 * This method returns an array of relevant components and their version
	 * at the time. The object itself may return multiple versions and
	 * components by itself, representing different modules overwriting the
	 * method.
	 *
	 * @return array
	 */
	function versioninfo()
	{
		// assume the instance version is just the coreversion by default
		return static::coreversion();
	}

	/**
	 * @return array
	 */
	static function coreversion()
	{
		return [ \preg_replace('#.*\\\#', '', __CLASS__) => self::VERSION ];
	}

} # trait
