<?php namespace mjolnir\types;

/** 
 * Common Language Interface
 * 
 * The Instantiatable interface is the base interface for any class that can 
 * have instances of itself, ie. new Class would make sense. When a class uses
 * the Instantiatable interface, any instances should be created via the 
 * instance method.
 * 
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Instantiatable # stable
{
	/**
	 * The instance of a class may be an old isntance, new instance, etc. 
	 * Inplementations of patterns such as a factory, singleton, should make use
	 * of this method as their object producer.
	 * 
	 * @return mixed
	 */
	static function instance();
	
} # interface
