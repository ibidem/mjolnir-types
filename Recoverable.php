<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Recoverable
{
	/**
	 * Recover from an error or undefined state. Typically involves switching
	 * the current renderable object to an error display state.
	 */
	function recover();

} # interface
