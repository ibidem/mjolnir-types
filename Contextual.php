<?php namespace mjolnir\types;

/**
 * This interface is used in access and security operations. The easiest way to
 * think of it is as "return all non random properties." So for example, some
 * `$engine->context()` might return the name of the manufacturer, the number of
 * gears, but it probably won't return the current temperature.
 *
 * Since this interface is mostly used for security checking, another way to
 * think about it is "what properties could be used in a access check."
 *
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Contextual
{
	/**
	 * Context information.
	 *
	 * [!!] This is not the same as returning metadata.
	 *
	 * @return array or null
	 */
	function context();

} # interface