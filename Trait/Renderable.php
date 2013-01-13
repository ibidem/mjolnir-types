<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Renderable
{
	/**
	 * @deprecated always use the render method!
	 */
	final function __toString()
	{
		// Renderables may contain logic, by allowing __toString not only does
		// Exception handling become unnecesarily complicated because of how
		// this special method can't throw exceptions, it also ruins the entire
		// stack by throwing the exception in a completely undefined manner,
		// ie. whenever it decides to convert to a string. Not worth it!

		// diagnose
		$trace = \debug_backtrace();
		$caller = \array_shift($trace);
		$debuginfo = "Called by {$caller['function']}";

		if (isset($caller['class']))
		{
			$debuginfo .= " in {$caller['class']}";
		}

		\mjolnir\log
			(
				'Error',
				"Casting to string not allowed! $debuginfo"
			);

		// emmit catchable fatal error; note that this will need to be converted
		// to an exception by a error handler set via \set_error_handler before
		// it can be catchable by an external try / catch
		return null;
	}

} # trait
