<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Savable
{
	/**
	 * @var boolean
	 */
	protected $saved = false;
	
	/**
	 * @return boolean
	 */
	function saved()
	{
		return $this->saved;
	}
	
	/**
	 * @return static $this
	 */
	function nosave()
	{
		$this->saved = true;
		return $this;
	}
	
	/**
	 * Check if notice was saved. Notices that don't reach the user can cause a
	 * lot of trouble.
	 */
	function __destruct()
	{
		if ( ! $this->saved)
		{
			\mjolnir\log('Bug', 'An unsaved Savable object was created.', 'Bugs');
		}
	}

} # trait
