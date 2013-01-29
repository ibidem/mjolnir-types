<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012, 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Standardized
{
	/**
	 * When you specify a standard the object will configure itself to match
	 * that standard. All standards should be implemented (if possible) though
	 * configuration files.
	 *
	 * Standards can also be used to create templates. Simply create your own
	 * standard then call the implicit methods.
	 * 
	 * A standard might reset the object (assuming the object is Resetable) or
	 * simply apply as-is.
	 *
	 * @return static $this
	 */
	function apply($standard);

} # interface
