<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Puppet
{
	/**
	 * @return string singular with dashes instead of spaces
	 */
	static function dashsingular()
	{
		return \str_replace(' ', '-', static::singular());
	}
	
	/**
	 * @return string plural with dashes instead of spaces
	 */
	static function dashplural()
	{
		return \str_replace(' ', '-', static::plural());
	}

} # trait
