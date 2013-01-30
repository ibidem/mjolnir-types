<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_HTMLFormField_Checkbox
{
	# HTMLFormField_Checkbox is derived from HTMLFormField therefore we do not
	# inherit the trait of HTMLFormField since this class is suppose to extend
	# a HTMLFormField class therefore having it already
	
	/**
	 * @return static $this
	 */
	function checked()
	{
		$this->set('checked', '');
		return $this;
	}
	
	/**
	 * @return static $this;
	 */
	function unchecked()
	{
		$this->set('checked', null);
		return $this;
	}
	
} # trait
