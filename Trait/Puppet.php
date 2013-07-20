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

	/**
	 * @return string singular that's safe to use in code context
	 */
	static function codename()
	{
		return \str_replace(' ', '_', static::singular());
	}

	/**
	 * @return string plural that's safe to use in code context
	 */
	static function codegroup()
	{
		return \str_replace(' ', '_', static::plural());
	}

	/**
	 * @return string camel case version
	 */
	static function camelsingular()
	{
		return \app\Arr::implode
			(
				'',
				\explode(' ', static::singular()),
				function ($key, $value)
				{
					return \ucfirst($value);
				}
			);
	}

	/**
	 * @return string camel case version
	 */
	static function camelplural()
	{
		return \app\Arr::implode
			(
				'',
				\explode(' ', static::plural()),
				function ($key, $value)
				{
					return \ucfirst($value);
				}
			);
	}

} # trait
