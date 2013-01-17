<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_View
{
	use \app\Trait_Renderable;
	use \app\Trait_Filebased;

	/**
	 * @var array
	 */
	protected $view_variables = null;

	/**
	 * [!!] use pass for objects
	 *
	 * Passing objects by reference is more costly then just passing the object,
	 * since when you pass an object by reference you are essentially creating
	 * a reference to a reference and passing it down, therby not saving
	 * anything but actually doing more work.
	 *
	 * The best candidates for passing by reference:
	 *  - large arrays
	 *  - very large strings
	 *
	 * @return static $this
	 */
	function bind($name, & $non_object)
	{
		$this->view_variables[$name] =& $non_object;
		return $this;
	}

	/**
	 * @return static $this
	 */
	function pass($name, $value)
	{
		$this->view_variables[$name] = $value;
		return $this;
	}

	/**
	 * @return string
	 */
	function render()
	{
		// extract view paramters into current scope as references to paramter
		// array in the view itself, skipping over already defined variables
		$this->view_variables === null or \extract($this->view_variables, EXTR_REFS);

		// start capture
		\ob_start();
		try
		{
			// include in current scope
			include $this->filepath();
		}
		catch (\Exception $error)
		{
			// cleanup
			\ob_end_clean();
			// re-throw
			throw $error;
		}
		// success
		return \ob_get_clean();
	}

	/**
	 * Inherit all variables from another view. The way you would use this is
	 * by having a subview inherit the current view to avoid passing in several
	 * variables down when all you want is to keep your views DRY by seperating
	 * repeatable patterns.
	 *
	 * If invoked multiple times the effect is identical to the method being
	 * invoked only on the last instance.
	 *
	 * [!!] This method may use references, therefore all operations should
	 * treat views that inherit other views as merely an extention of the
	 * inhereted view.
	 *
	 * @return static $this
	 */
	function inherit(\mjolnir\types\View $view)
	{
		$this->view_variables =& $view->view_variables;
		return $this;
	}

} # trait