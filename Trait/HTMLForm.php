<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_HTMLForm
{
	use \app\Trait_HTMLTag;
	
	/**
	 * @var array
	 */
	protected static $errors = null;
	
	// ------------------------------------------------------------------------
	// Errors & Values
	
	/**
	 * Binds errors for the from.
	 * 
	 * eg.
	 * 
	 *		HTMLForm::instance()->errors_are($errors['Something.add']);
	 * 
	 * In a simpler context (or partials) you may just have $errors, but 
	 * typically you'll have more then one form so you'll need to bind to a 
	 * unique key.
	 * 
	 * @return static $this
	 */
	function errors_are(array & $errors = null)
	{
		$this->errors =& $errors;
		return $this;
	}
	
	/**
	 * Retrieves errors for a given field or all errors if no field 
	 * is specified.
	 * 
	 * @return array or null
	 */
	function errors($field = null)
	{
		if ($field == null)
		{
			return $this->errors;
		}
		else # field errors
		{
			if ($this->errors !== null)
			{
				if (isset($this->errors[$field]))
				{
					return $this->errors[$field];
				}
				else # not set
				{
					return null;
				}
			}
		}
	}
	
	// ------------------------------------------------------------------------
	// Utility
	
	/**
	 * @return string
	 */
	function sign()
	{
		return ' form="'.$this->signature().'"';
	}
	
	/**
	 * @return string
	 */
	function mark()
	{
		return ' tabindex="'.HTML::tabindex().$this->sign();
	}
	
} # trait
