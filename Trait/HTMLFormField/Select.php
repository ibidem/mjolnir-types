<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_HTMLFormField_Select
{
	# HTMLFormField_Composite is derived from HTMLFormField therefore we do not
	# inherit the trait of HTMLFormField since this class is suppose to extend
	# a HTMLFormField class therefore having it already
	
	protected $options = null;
	
	/**
	 * Inserts options via associtive array of key => value pairs.
	 * 
	 * @return static $this
	 */
	function options_array(array $array)
	{
		$this->options = $array;
		return $this;
	}
	
	/**
	 * Inserts values by interpreting tablular array as is typically the result
	 * of a SQL call. If the table is nonstandard you can provide an idkey and 
	 * titlekey to help the function retrieve the correct values.
	 * 
	 * Typically defaults for idkey and title key are "id" and "title."
	 * 
	 * @return static $this
	 */
	function options_table(array $table, $valuekey = null, $labelkey = null)
	{
		$this->options = \app\Arr::associative_from($table, $valuekey, $labelkey);
		return $this;
	}
	
	/**
	 * @return static $this
	 */
	function value_is($value)
	{
		$this->values = $value === null ? null : [ $value ];
		return $this;
	}
	
	/**
	 * @return static $this
	 */
	function value_array(array $values = null)
	{
		$this->values = $values;
		return $this;
	}
	
	/**
	 * @return array or null
	 */
	function options()
	{
		return $this->options;
	}
	
} # trait
