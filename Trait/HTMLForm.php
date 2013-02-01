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
	#
	# HTMLForm is derived from HTMLTag therefore we do not inherit the trait of 
	# HTMLTag since this class is suppose to extend a HTMLTag class therefore 
	# having it already
	#
	
	use \app\Trait_Standardized;
	
	/**
	 * @var array
	 */
	protected $errors = null;
	
	/**
	 * @var array
	 */
	protected $fieldtemplates = null;
	
	/**
	 * @var array
	 */
	protected $hintrenderers = null;
	
	/**
	 * @var array
	 */
	protected $errorrenderers = null;
	
	// ------------------------------------------------------------------------
	// Specialized Fields & Shorthands
	
	#
	# [!!] pseudofieldtype (3rd parameter of field method) is NOT fieldtype, 
	# it's the idenfier for what the field is. For example in the case of a
	# button fieldtype for a button is submit, but it's pseudofieldtype is
	# button because we are refering to the button tag and want the button
	# entry in the configuration, not the input / submit version. Another 
	# example would be phonenumber, the actual fieldtype is tel.
	#
	
	/**
	 * @return \mjolnir\types\HTMLFormField_Select
	 */
	function select($label, $fieldname = null)
	{
		return $this->field($label, $fieldname, 'select');
	}
	
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
	function submit($label, $fieldname = null, $tagvalue = null)
	{
		return $this->field($label, $fieldname, 'submit')
			->value_is($tagvalue);
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function button($label, $fieldname = null, $tagbody = null)
	{
		return $this->field($label, $fieldname, 'button')
			->tagname_is('button')
			->tagbody_is($tagbody);
	}
	
	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function reset($label, $fieldname = null, $tagvalue = null)
	{
		return $this->field($label, $fieldname, 'reset')
			->value_is($tagvalue);
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
	function errors_are(array &$errors = null)
	{
		$this->errors = &$errors;
		return $this;
	}
	
	/**
	 * Retrieves errors for a given field or all errors if no field 
	 * is specified.
	 * 
	 * @return array or null
	 */
	function errors($fieldname = null)
	{
		if ($fieldname == null)
		{
			return $this->errors;
		}
		else # field errors
		{
			if ($this->errors !== null)
			{
				if (isset($this->errors[$fieldname]))
				{
					return $this->errors[$fieldname];
				}
				else # not set
				{
					return null;
				}
			}
		}
	}
	
	// ------------------------------------------------------------------------
	// Formatting
	
	/**
	 * If fieldtype is null the template will replace the general 
	 * purpose template that applies to all fields in the absence of a 
	 * specialized template, otherwise a specialized template will be added.
	 * 
	 * You can only have one template per field, most specific template applies.
	 * 
	 * @return static $this
	 */
	function addfieldtemplate($template, $fieldtype = null)
	{
		$fieldtype != null or $fieldtype = 'field';
		$this->fieldtemplates[$fieldtype] = $template;
		
		return $this;
	}
	
	/**
	 * When fieldtype is null the general purpose template will be retrieved.
	 * 
	 * @return string
	 */
	function fieldtemplate($fieldtype = null)
	{
		$fieldtype !== null or $fieldtype = 'field';
		if ($this->fieldtemplates !== null)
		{
			if (isset($this->fieldtemplates[$fieldtype]))
			{
				return $this->fieldtemplates[$fieldtype];
			}
			else if (isset($this->fieldtemplates['field']))
			{
				return $this->fieldtemplates['field'];
			}
		}
		
		// hard default: display field only
		return ':field';
	}
	
	/**
	 * If fieldtype is null the template will replace the general 
	 * purpose template that applies to all fields in the absence of a 
	 * specialized template, otherwise a specialized template will be added.
	 * 
	 * @return static $this
	 */
	function addhintrenderer(callable $hintrenderer, $fieldtype = null)
	{
		$fieldtype != null or $fieldtype = 'field';
		$this->hintrenderers[$fieldtype] = $hintrenderer;
		
		return $this;
	}
	
	/**
	 * When fieldtype is null the general purpose error renderer will 
	 * be retrieved.
	 * 
	 * Signature: function (array &$hints = null)
	 * 
	 * @return callable
	 */
	function hintrenderer($fieldtype = null)
	{
		$fieldtype !== null or $fieldtype = 'field';
		if ($this->hintrenderers !== null)
		{
			if (isset($this->hintrenderers[$fieldtype]))
			{
				return $this->hintrenderers[$fieldtype];
			}
			else if (isset($this->hintrenderers['field']))
			{
				return $this->hintrenderers['field'];
			}
		}
		
		// hard default: do not display errors
		return function (array &$hints = null) { return ''; };
	}
	
	/**
	 * If fieldtype is null the template will replace the general 
	 * purpose template that applies to all fields in the absence of a 
	 * specialized template, otherwise a specialized template will be added.
	 * 
	 * Signature: function (array &$errors = null)
	 * 
	 * @return static $this
	 */
	function adderrorrenderer(callable $errorrenderer, $fieldtype = null)
	{
		$fieldtype != null or $fieldtype = 'field';
		$this->errorrenderers[$fieldtype] = $errorrenderer;
		
		return $this;
	}
	
	/**
	 * When fieldtype is null the general purpose error renderer will 
	 * be retrieved.
	 * 
	 * @return callable
	 */
	function errorrenderer($fieldtype = null)
	{
		$fieldtype !== null or $fieldtype = 'field';
		if ($this->errorrenderers !== null)
		{
			if (isset($this->errorrenderers[$fieldtype]))
			{
				return $this->errorrenderers[$fieldtype];
			}
			else if (isset($this->errorrenderers['field']))
			{
				return $this->errorrenderers['field'];
			}
		}
		
		// hard default: do not display errors
		return function (array &$errors = null) { return ''; };
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
