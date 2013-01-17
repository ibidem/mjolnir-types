<?php namespace mjolnir\types;

/**
 * A savable object acts much like an Executable object only not saving it is 
 * treated as an error (unless the object is explicilty set to a nosave state).
 * 
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Savable
{
	/**
	 * @return static $this
	 */
	function save();
	
	/**
	 * @return boolean
	 */
	function saved();
	
	/**
	 * @return static $this
	 */
	function nosave();

} # interface
