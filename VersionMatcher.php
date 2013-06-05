<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface VersionMatcher extends Matcher
{
	/**
	 * Given a version, is there any chance the version can be satsfied; 
	 * ie. is the version still lower then all the potential versions
	 * 
	 * @return boolean
	 */
	function usable();
	
	/**
	 * @return static
	 */
	function targetversion($targetversion);

} # interface
