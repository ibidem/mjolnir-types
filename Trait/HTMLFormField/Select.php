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
	#
	# HTMLFormField_Select is derived from HTMLFormField therefore we do not
	# inherit the trait of HTMLFormField since this class is suppose to extend
	# a HTMLFormField class therefore having it already
	#

	/**
	 * @var array selected values
	 */
	protected $values = null;

	/**
	 * Inserts values by interpreting tablular array as is typically the result
	 * of a SQL call. If the table is nonstandard you can provide an idkey and
	 * titlekey to help the function retrieve the correct values.
	 *
	 * Typically defaults for idkey and title key are "id" and "title."
	 *
	 * If groupkey is provided the method will insert optgroups instead of
	 * normal options, unless the value for the group is null.
	 *
	 * @return static $this
	 */
	function options_table(array $table, $valuekey = null, $labelkey = null, $groupkey = null)
	{
		$optgroups = [];
		$options = [];

		if ($groupkey === null)
		{
			$options = \app\Arr::associative_from($table, $valuekey, $labelkey);
		}
		else # got group key
		{
			foreach ($table as $row)
			{
				if ($row[$groupkey] !== null)
				{
					isset($optgroups[$row[$groupkey]]) or $optgroups[$row[$groupkey]] = [];
					$optgroups[$row[$groupkey]][$row[$valuekey]] = $row[$labelkey];
				}
				else # null group
				{
					$options[$row[$valuekey]] = $row[$labelkey];
				}
			}
		}

		$this->options_array($options);
		$this->optgroups_array($optgroups);

		return $this;
	}

	/**
	 * @return static $this
	 */
	function value_is($value)
	{
		if (\is_array($value))
		{
			$this->value_array($value);
		}
		else # single value
		{
			$this->value_array([ $value ]);
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function value_array(array $values = null)
	{
		// normalize values
		if ($values)
		{
			$this->values = null;
			foreach ($values as $value)
			{
				$this->values[] = $value;
			}
		}

		return $this;
	}

} # trait
