<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_ViewFrame
{
	/**
	 * Starts view frame.
	 */
	static function frame()
	{
		\ob_start();
	}

	/**
	 * Ends view frame.
	 *
	 * @return string
	 */
	static function endframe()
	{
		return \ob_get_clean();
	}

} # trait
