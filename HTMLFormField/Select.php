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
	 * @return static $this
	 */
	function options_array(array $array);
	
	/**
	 * Inserts values by interpreting tablular array as is typically the result
	 * of a SQL call. If the table is nonstandard you can provide an idkey and 
	 * titlekey to help the function retrieve the correct values.
	 * 
	 * Typically defaults for idkey and title key are "id" and "title."
	 * 
	 * @return static $this
	 */
	function options_table(array $table, $idkey = null, $titlekey = null);
	
	/**
	 * @return array
	 */
	function options();
	
} # interface