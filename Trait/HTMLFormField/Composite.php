<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_HTMLFormField_Composite
{
	#
	# HTMLFormField_Composite is derived from HTMLFormField therefore we do not
	# inherit the trait of HTMLFormField since this class is suppose to extend
	# a HTMLFormField class therefore having it already
	#
	
	/**
	 * @var array
	 */
	protected $fieldmix = null;
	
	/**
	 * @return static $this
	 */
	function value_is($fieldvalue)
	{
		// do nothing
		
		return $this;
	}
	
	/**
	 * @return static $this
	 */
	function errors()
	{
		// start with errors set explicitly on field
		$errors = $this->errors;
		
		if ($errors == null)
		{
			$errors = [];
		}
		
		// add the errors in all the fields
		if ($this->compositefields !== null)
		{
			foreach ($this->compositefields as $field)
			{
				$fielderrors = $field->errors();
				
				if ($fielderrors !== null)
				{
					$errors = \app\Arr::merge($errors, $fielderrors);
				}
			}
		}
		
		return $errors;
	}
	
	/**
	 * A template by which to mix the fields togheter. The template accepts
	 * %X entries where X is the index of the field (based on order they were
	 * introduced).
	 * 
	 * eg.
	 *		
	 *		$f->composite
	 *			(
	 *				'Date & Time'
	 *				[ 'datefield' => 'date', 'timefield' => 'time' ]
	 *			)
	 *			->fieldmix('%1 at %2 o'clock');
	 * 
	 * @return static $this
	 */
	function fieldmix($fieldmix)
	{
		$this->fieldmix = $fieldmix;
		return $this;
	}
	
} # trait
