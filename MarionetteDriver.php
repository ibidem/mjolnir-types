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
	 * @return array updated entry
	 */
	function compile($field, array $entry, array $conf = null);

} # interface
