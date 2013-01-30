<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_HTMLFormField
{
	# HTMLFormField is derived from HTMLTag therefore we do not inherit the 
	# trait of HTMLTag since this class is suppose to extend a HTMLTag class
	# therefore having it already
	
	use \app\Trait_Standardized;

	/**
	 * @var \mjolnir\types\HTMLForm
	 */
	protected $form = null;
	
	/**
	 * @var boolean
	 */
	protected $showerrors = true;
	
	/**
	 * @var callable
	 */
	protected $errorrenderer = null;
	
	/**
	 * @var callable
	 */
	protected $hintrenderer = null;
	
	/**
	 * @var string
	 */
	protected $fieldlabel = null;
	
	/**
	 * Varifier for the field's autocompletetion calculations. Calculations must
	 * be performed once, duplicate execution of the calculations may lead to
	 * undefined behavior.
	 * 
	 * @var boolean 
	 */
	protected $autocompleted = false;
	
	/**
	 * Set value using default value representation. May call act as a proxy for
	 * other methods.
	 * 
	 * @return static $this
	 */
	function value_is($fieldvalue)
	{
		$this->set('value', $fieldvalue);
		return $this;
	}
	
	/**
	 * @return static $this
	 */
	function fieldlabel_is($fieldlabel)
	{
		$this->fieldlabel = $fieldlabel;
		return $this;
	}
	
	/**
	 * @return string
	 */
	function fieldlabel()
	{
		return $this->fieldlabel;
	}
	
	// ------------------------------------------------------------------------
	// Renderers
	
	/**
	 * Set the renderer used when rendering help text. Callable should accept
	 * an array of hints.
	 * 
	 * @return static $this
	 */
	function hintrenderer_is(callable $renderer)
	{
		$this->hintrenderer = $renderer;
		return $this;
	}
	
	/**
	 * @return callable
	 */
	function hintrenderer()
	{
		return $this->hintrenderer;
	}
	
	/**
	 * Set the renderer used when rendering help text. Callable should accept
	 * an array of errors.
	 * 
	 * @return static $this
	 */
	function errorrenderer_is(callable $renderer)
	{
		$this->errorrenderer = $renderer;
		return $this;
	}
	
	/**
	 * @return callable
	 */
	function errorrenderer()
	{
		return $this->errorrenderer;
	}
	
	// ------------------------------------------------------------------------
	// Utility
	
	/**
	 * Template to use when generating field. The following placeholders can
	 * be used when creating the template
	 * 
	 *	:label  - the label of the field
	 *  :field  - the field
	 *  :hints  - insertion point for help renderer
	 *  :errors - insertion point for error renderer
	 * 
	 * @return static $this
	 */
	function template_is($template)
	{
		$this->template = $template;
		return $this;
	}
	
	/**
	 * @return string
	 */
	function template()
	{
		return $this->template;
	}
	
	/**
	 * Adds a tip/hint/help message to be used by the hint renderer.
	 * 
	 * @return static $this
	 */
	function hint($hint)
	{
		$this->hints[] = $hint;
	}
	
	/**
	 * @return array or null
	 */
	function hints()
	{
		return $this->hints;
	}
	
	// ------------------------------------------------------------------------
	// interface: Standardized
	
	/**
	 * @return static $this
	 */
	function apply($standard)
	{
		$standard = \app\CFS::config('mjolnir/htmlform')['field.standards'][$standard];
		$standard($this);
		
		return $this;
	}
	
	// ------------------------------------------------------------------------
	// interface: Rendered
	
	/**
	 * [!!] call autocompletefield in overwrited render before any other logic
	 * 
	 * @return string
	 */
	function render()
	{
		$this->autocompletefield();
		return parent::render();
	}
	
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
	
	// ------------------------------------------------------------------------
	// etc
	
	/**
	 * Hide errors for this field.
	 * 
	 * @return static $this
	 */
	function noerrors()
	{
		$this->showerrors = false;
	}
	
	/**
	 * Show errors for this field.
	 * 
	 * @return static $this
	 */
	function showerrors()
	{
		$this->showerrors = true;
	}
	
	// ------------------------------------------------------------------------
	// Helpers
	
	/**
	 * This helper will run once. Classes that overwrite render should call this
	 * method before performing calculations.
	 */
	protected function autocompletefield()
	{
		if ( ! $this->autocompleted)
		{
			$fieldname = $this->get('name', null);

			if ($fieldname !== null && ($autovalue = $this->form->autovalue($fieldname)) !== null)
			{
				$this->value_is($autovalue);
			}
			
			$this->autocompleted = true;
		}
	}
	
} # trait
