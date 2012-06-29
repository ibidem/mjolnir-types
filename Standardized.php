<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * @package    ibidem
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
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
	 * standard then call the implicit methods. When deriving from another 
	 * standard the naming should be standard.derived. 
	 * 
	 *    Form example: twitter.table-controls, twitter.general, etc
	 * Where twitter would configure it for displaying in the Twitter Bootstrap
	 * format, and table-controls and general would be derived standards.
	 * 
	 * @param string param
	 * @return mixed $this
	 */
	function standard($standard);
	
} # interface
