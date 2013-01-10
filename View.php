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
interface View
{
	/**
	 * @param string valid PHP variable name
	 * @param array array to bind
	 * @return static $this
	 */
	function bind($name, array & $variable);

	/**
	 * @param string valid PHP variable name
	 * @param mixed value to set
	 * @return static $this
	 */
	function pass($name, $value);

	/**
	 * Inherit all variables from the other view. The way you would use this is
	 * by having a sub view inherit the current view, to avoid passing, several
	 * variables down when all you want is to keep your views DRY.
	 *
	 * @return static $this
	 */
	function inherit(\mjolnir\types\View $view);

	// __toString needs to be protected and final

} # interface