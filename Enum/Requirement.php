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
interface Enum_Requirement # stable
{
	// ideal settings available
	const available = '\ibidem\types\Enum_Requirement::available';
	// ideal settings not available but backup available; ie. will work
	const failed = '\ibidem\types\Enum_Requirement::failed';
	// minimum requirements not met; behaviour is undefined
	const error = '\ibidem\types\Enum_Requirement::error';
	// test fails with exception; equivalent to error in severity
	const untestable = '\ibidem\types\Enum_Requirement::untestable';
	
} # interface
