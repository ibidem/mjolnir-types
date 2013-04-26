<?php namespace mjolnir\types;

/**
 * PROTOTYPE - subject to change
 * 
 * A MarionetteDriver runs on a new entry before it's processed.
 * 
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface MarionetteDriver 
{
	#
	# Driver may or may not require a SQLDatabase, the option should be 
	# available in the instance method or though other factory constructors.
	#
	
	/**
	 * On POST, resolve input dependencies (happens before validation).
	 * 
	 * @return array updated entry
	 */
	function compile($field, array $entry, array $conf = null);
	
	/**
	 * On POST, field processing before POST database communication.
	 * 
	 * @return array updated fieldlist
	 */
	function compilefields($field, array $fieldlist, array $conf = null);

	/**
	 * On GET, manipulate execution plan.
	 * 
	 * @return array updated execution plan
	 */
	function inject($field, array $plan, array $conf = null);
	
} # interface
