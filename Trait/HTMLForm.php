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
	# HTMLForm is derived from HTMLTag therefore we do not inherit the trait of 
	# HTMLTag since this class is suppose to extend a HTMLTag class therefore 
	# having it already
	
	use \app\Trait_Standardized;
	
	/**
	 * @var array
	 */
	protected static $errors = null;
	
	// ------------------------------------------------------------------------
	// Specialized Fields & Shorthands
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function hidden($fieldname = null)
	{
		return $this->field(null, $fieldname, 'hidden');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function submit($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'submit');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function button($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'button');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function reset($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'reset');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function text($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'text');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField_Textarea
	 */
	function textarea($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'textarea');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function password($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'password');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function radio($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'radio');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField_Checkbox
	 */
	function checkbox($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'checkbox');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function file($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'file');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function search($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'search');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function number($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'number');
	}
	
	/**
	 * ie. 1234-123-33 and similar non-numeric IDs
	 * 
	 * @return \mjolnir\types\HTMLFormField
	 */
	function identifier($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'identifier');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function currency($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'currency');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function phonenumber($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'phonenumber');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function url($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'url');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function email($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'email');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function month($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'month');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function week($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'week');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function color($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'color');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function range($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'range');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function image($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'image');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function date($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'date');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function time($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'time');
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function datetime($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'datetime');
	}
	
	/**
	 * Same as datetime only there is no timezone.
	 * 
	 * @return \mjolnir\types\HTMLFormField
	 */
	function localdatetime($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'localdatetime');
	}
	
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
		return ' tabindex="'.\app\HTML::tabindex().'"'.$this->sign();
	}
	
	// ------------------------------------------------------------------------
	// interface: Standardized
	
	/**
	 * @param type $standard
	 */
	function apply($standard)
	{
		$standard = \app\CFS::config('mjolnir/htmlform')['form.standards'][$standard];
		$standard($this);
		
		return $this;
	}
	
	// ------------------------------------------------------------------------
	// interface: Rendered
	
	/**
	 * This class is an exception to the no __toString rule of Renderable. Using
	 * __toString in a case where another Renderable has been injected into 
	 * the current Renderable object is still considered a grave mistake and 
	 * implementations should issue an error in development; if feasible.
	 * 
	 * @return string
	 */
	function __toString()
	{
		try
		{
			return $this->render();
		}
		catch (\Exception $exception)
		{	
			// diagnose
			$trace = \debug_backtrace();
			$caller = \array_shift($trace);
			$debuginfo = "Called by {$caller['function']}";

			if (isset($caller['class']))
			{
				$debuginfo .= " in {$caller['class']}";
			}

			\mjolnir\log
				(
					'Error',
					"Error while casting form field to string: {$exception->getMessage()} $debuginfo"
				);

			if (\app\CFS::config('mjolnir/base')['development'])
			{
				// emmit catchable fatal error; note that this will need to be 
				// converted to an exception by a error handler set via 
				// \set_error_handler before it can be catchable by an external 
				// try / catch
				return null;
			}
			else # production
			{
				return ''; # gracefully emmit the error
			}
		}
	}
	
} # trait
