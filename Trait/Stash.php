<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Stash
{
	/**
	 * Given a key, removes all special characters.
	 *
	 * @return string sanitized key
	 */
	protected static function safe_key($key)
	{
		// remove namespace delcaration, special characters,
		// and convert :: to double underscore
		return \preg_replace
			(
				'#[^a-zA-Z0-9_]#', '', # find & replace
				\str_replace
					(
						'::', '__', # find & replace
						\join('', \array_slice(\explode('\\', $key), -1))
					)
			);
	}

} # trait
