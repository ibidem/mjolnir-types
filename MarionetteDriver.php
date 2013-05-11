<?php namespace mjolnir\types;

/**
 * PROTOTYPE - subject to change
 * 
 * A MarionetteDriver runs at different processing stages for entering new 
 * entries, retrieving entries, etc.
 * 
 * Information such as the current Marionette object, the field name, driver
 * configuration for the given field, etc (ie. any other constants), should be 
 * provided via the constructor.
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
	
	// --- Steps --------------------------------------------------------------
	
	/**
	 * On POST, resolve input dependencies (happens before validation).
	 * 
	 * @return array updated entry
	 */
	function compile(array $entry);
	
	/**
	 * Resolve dependencies after the entry has been created.
	 * 
	 * @return array updated entry
	 */
	function latecompile(array $entry, array $input);
	
	/**
	 * On POST, field processing before POST database communication.
	 * 
	 * @return array updated fieldlist
	 */
	function compilefields(array $fieldlist);

	/**
	 * On GET, manipulate execution plan.
	 * 
	 * @return array updated execution plan
	 */
	function inject(array $plan);
	
	// --- Configuration (Internal) -------------------------------------------
	
	/**
	 * @return normalized configuration
	 */
	function normalizeconfig(array $conf);
	
	/**
	 * @return static $this
	 */
	function database_is(\mjolnir\types\SQLDatabase $db);
	
	/**
	 * @return static $this
	 */
	function context_is(\mjolnir\types\Marionette $context);
	
	/**
	 * Field key, on which the driver is applied on; field is not necesarily a 
	 * database field, but for reference and input purposes a field must be 
	 * provided.
	 * 
	 * @return static $this
	 */
	function field_is($field);
	
	/**
	 * Driver configuration. Will normalize input.
	 * 
	 * @return static $this
	 */
	function config_is($config);
	
} # interface
