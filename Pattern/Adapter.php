<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * Adapter's convert a object to the desired interface. There are 3 ways to do 
 * it, all involve implementing the target interface:
 * 
 * 1 - extend the class (if you're lucky)
 * 2 - add the object to the adapter as a attribute
 * 3 - translate the interface using only the target's interface
 * 
 * 3 is ideal (use this interface as a template and add the correct contracts).
 * 2 is recomended, when the target class doesn't use an interface. 1 is the 
 * easiest, but not recomended as it can easily cause naming conflict with class
 * methods and adapter's methods; if not imediatly, eventually.
 * 
 * @package    ibidem
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2008-2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Pattern_Adapter
{
	/**
	 * @param mixed instance of the converted object
	 * @return $this
	 */
	static function instance($object);
	
} # interface
