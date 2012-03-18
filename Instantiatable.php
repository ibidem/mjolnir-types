<?php namespace kohana4\types;

/** 
 * Common Language Interface
 * 
 * The Instantiatable interface is the base interface for any class that can 
 * have instances of itself, ie. new Class would make sense. When a class uses
 * the Instantiatable interface, any instances should be created via the 
 * instance method.
 * 
 * @package    Kohana4
 * @category   Types
 * @author     Kohana Team
 * @copyright  (c) 2008-2012 Kohana Team
 * @license    http://kohanaframework.org/license
 */
interface Instantiatable
{
	/**
	 * The instance of a class may be an old isntance, new instance, etc. 
	 * Inplementations of patterns such as a factory, singleton, should make use
	 * of this method as their object producer.
	 * 
	 * @return \kohana4\types\Instantiatable
	 */
	static function instance();
	
} # interface
