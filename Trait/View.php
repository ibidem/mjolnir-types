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
	use \app\Trait_RawView;
	use \app\Trait_Filebased;

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

} # trait
