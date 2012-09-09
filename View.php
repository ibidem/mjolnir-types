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
	 * @return \mjolnir\types\View $this
	 */
	function bind($name, array & $variable);
	
	/**
	 * @param string valid PHP variable name
	 * @param mixed value to set
	 * @return \mjolnir\types\View $this
	 */
	function variable($name, $value);

	// __toString needs to be protected and final
	
} # interface