<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * @package    ibidem
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2008-2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface View
{
	/**
	 * @return string redered view
	 */
	function render();
	
	/**
	 * @param string valid PHP variable name
	 * @param mixed variable to bind
	 * @return $this
	 */
	function bind($name, & $variable);
	
	/**
	 * @param string valid PHP variable name
	 * @param mixed value to set
	 * @return $this
	 */
	function constant($name, $value);

	// __toString needs to be protected and final
	
} # interface