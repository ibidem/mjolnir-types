<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * A composite is a object that provides an interface for simultaniously 
 * accessing other objects. 
 * 
 * Recomendation: implement this interface and the interface of the object you
 * are making a composite of. So if it's a bunch of documents, then you would
 * implement this pattern and the Document interface.
 * 
 * @package    ibidem
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2008-2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Pattern_Composite
{
	/**
	 * @param mixed object of the compisit'ed interface
	 * @return $this
	 */
	function plugin($object);
	
} # interface
