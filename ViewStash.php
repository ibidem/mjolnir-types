<?php namespace mjolnir\types;

/** 
 * Common Language Interface
 * 
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface ViewStash # stable
{
	/**
	 * Based on stashed key a cached version of the content is returned, 
	 * otherwise the part is buffered in and cached in $key when the save method
	 * is called.
	 *
	 * The stash should take into account current Lang when processing.
	 *
	 * @return bool true if key exists, false otherwise
	 */
	static function load($key, array $tags = []);

	/**
	 * When null retrieves the key provided by stashed. The keys are provided as
	 * a stack and the keys are consumed on subsequent calls to permit nested 
	 * stashed calls.
	 */
	static function save();

} # interface
