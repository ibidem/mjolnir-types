<?php namespace kohana4\types;

/** 
 * Common Language Interface
 * 
 * @package    Kohana4
 * @category   Types
 * @author     Kohana Team
 * @copyright  (c) 2008-2012 Kohana Team
 * @license    http://kohanaframework.org/license
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