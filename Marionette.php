<?php namespace mjolnir\types;

/**
 * PROTOTYPE - subject to change
 * 
 * A Marionette is a model that's specifically designed to work well with rest 
 * apis and works as an object as opposed to Model_* type classes which work as 
 * a library of functions.
 * 
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Marionette extends Puppet
{
	/**
	 * @return string table with database prefix
	 */
	static function table();
	
	/**
	 * @return array marionette configuration
	 */
	static function config();

} # interface
