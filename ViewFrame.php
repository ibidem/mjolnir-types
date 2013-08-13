<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface ViewFrame
{
	/**
	 * Starts view frame.
	 */
	static function frame();

	/**
	 * Ends view frame.
	 *
	 * @return string
	 */
	static function endframe();

} # interface