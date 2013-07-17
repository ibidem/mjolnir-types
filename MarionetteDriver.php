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

	# POST

		/**
		 * On POST, resolve input dependencies (happens before validation).
		 *
		 * @return array updated entry
		 */
		function post_compile(array $input);

		/**
		 * Resolve dependencies after the entry has been created with POST.
		 *
		 * @return array updated entry
		 */
		function post_latecompile(array $entry, array $input);

		/**
		 * On POST, field processing before POST database communication.
		 *
		 * @return array updated fieldlist
		 */
		function post_compilefields(array $fieldlist);

	# PATCH

		/**
		 * On PATCH, resolve input dependencies (happens before validation).
		 *
		 * @param array updated entry
		 */
		function patch_compile($id, array $entry);

		/**
		 * Resolve dependencies after the entry has been been patched.
		 *
		 * @param array updated entry
		 */
		function patch_latecompile($id, array $entry, array $input);

		/**
		 * Field processing before PATCH database communication.
		 *
		 * @return array updated fieldlist
		 */
		function patch_compilefields(array $fieldlist);

	# GET

		/**
		 * On GET, manipulate execution plan.
		 *
		 * @return array updated execution plan
		 */
		function inject(array $plan);

	# DELETE

		/**
		 * Execute before entry is deleted.
		 */
		function predelete($id);

		/**
		 * Execute after entry is deleted.
		 */
		function postdelete($id);

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
