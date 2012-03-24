<?php namespace kohana4\types;

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
 * @package    Kohana4
 * @category   Types
 * @author     Kohana Team
 * @copyright  (c) 2008-2012 Kohana Team
 * @license    http://kohanaframework.org/license
 */
interface Pattern_Composite
{
	/**
	 * @param mixed object of the compisit'ed interface
	 * @return $this
	 */
	function plugin($object);
	
} # interface
