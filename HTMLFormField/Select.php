<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface HTMLFormField_Select extends HTMLFormField
{
	/**
	 * Inserts options via associtive array of key => value pairs.
	 * 
	 * See optgroups_array for option group version.
	 * 
	 * @return static $this
	 */
	function options_array(array $array = null);
	
	/**
	 * Insert options via associative array of groups pointing to associative
	 * array of options. Note that optgroups are treated as seperate entities
	 * to options, so you can have both in the same select.
	 * 
	 * If normal options are present, groups are rendered after them.
	 * 
	 * @return static $this
	 */
	function optgroups_array(array $optgroups = null);
	
	/**
	 * Inserts values by interpreting tablular array as is typically the result
	 * of a SQL call. If the table is nonstandard you can provide an idkey and 
	 * titlekey to help the function retrieve the correct values.
	 * 
	 * Typically defaults for idkey and title key are "id" and "title."
	 * 
	 * If groupkey is provided the method will insert optgroups instead of 
	 * normal options.
	 * 
	 * @return static $this
	 */
	function options_table(array $table, $valuekey = null, $labelkey = null, $groupkey = null);
	
	/**
	 * @return static $this
	 */
	function value_array(array $values = null);
	
} # interface