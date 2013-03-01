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
	#
	# HTMLFormField is derived from HTMLTag therefore we do not inherit the
	# trait of HTMLTag since this class is suppose to extend a HTMLTag class
	# therefore having it already
	#

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
	 * @var string
	 */
	protected $fieldtemplate = null;

	/**
	 * Varifier for the field's autocompletetion calculations. Calculations must
	 * be performed once, duplicate execution of the calculations may lead to
	 * undefined behavior.
	 *
	 * @var boolean
	 */
	protected $autocompleted = false;

	/**
	 * @var array
	 */
	protected $hints = null;

	/**
	 * @var array
	 */
	protected $errors = null;

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
	function fieldtemplate_is($fieldtemplate)
	{
		$this->fieldtemplate = $fieldtemplate;
		return $this;
	}

	/**
	 * @return string
	 */
	function fieldtemplate()
	{
		return $this->fieldtemplate;
	}

	/**
	 * Adds a tip/hint/help message to be used by the hint renderer.
	 *
	 * @return static $this
	 */
	function hint($hint)
	{
		$this->hints[] = $hint;
		return $this;
	}

	/**
	 * @return array or null
	 */
	function hints()
	{
		return $this->hints;
	}

	/**
	 * @return static $this
	 */
	function adderror($message)
	{
		$this->errors[] = $message;
		return $this;
	}

	/**
	 * @return static $this
	 */
	function adderrors(array $errors = null)
	{
		if ($this->errors === null)
		{
			$this->errors = $errors;
		}
		else if ($errors !== null)
		{
			foreach ($errors as $message)
			{
				$this->errors[] = $message;
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function errors()
	{
		return $this->errors;
	}

	/**
	 * @return string
	 */
	function fieldrender()
	{
		return parent::render(); # HTMLTag::render
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
	// etc

	/**
	 * Hide errors for this field.
	 *
	 * @return static $this
	 */
	function noerrors()
	{
		$this->showerrors = false;
		return $this;
	}

	/**
	 * Show errors for this field.
	 *
	 * @return static $this
	 */
	function showerrors()
	{
		$this->showerrors = true;
		return $this;
	}

	/**
	 * @return static $this
	 */
	function disable_autocomplete()
	{
		$this->autocompleted = true;
		return $this;
	}

	/**
	 * @return static $this
	 */
	function enable_autocomplete()
	{
		$this->autocompleted = false;
		return $this;
	}

} # trait
