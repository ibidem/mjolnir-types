<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012, 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_ThemeView
{
	#
	# ThemeView is derived from View therefore we do not inherit the trait of
	# View since this class is suppose to extend a View class therefore having
	# it already
	#

	use \app\Trait_Channeled;

	/**
	 * @var string
	 */
	protected $themepath = null;

	/**
	 * @var string
	 */
	protected $viewtarget = null;

	/**
	 * @return static $this
	 */
	function themepath_is($themepath)
	{
		$this->themepath = $themepath;
		return $this;
	}

	/**
	 * @return string or null
	 */
	function themepath()
	{
		return $this->themepath;
	}

	/**
	 * @return static $this
	 */
	function viewtarget_is($viewtarget)
	{
		$this->viewtarget = $viewtarget;
		return $this;
	}

	/**
	 * @return string
	 */
	function viewtarget()
	{
		return $this->viewtarget;
	}

} # trait
