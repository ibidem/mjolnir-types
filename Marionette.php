<?php namespace mjolnir\types;

/**
 * PROTOTYPE - subject to change
 * 
 * A Marionette is a model that's specifically designed to work though a object
 * based process.
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

	/**
	 * @return string
	 */
	static function keyfield();
	
	// --- Reference Helpers --------------------------------------------------
	
	/**
	 * @return \mjolnir\types\MarionetteCollection corresponding to this marionette
	 */
	function collection();
	
	/**
	 * @return \mjolnir\types\MarionetteModel corresponding to this marionette
	 */
	function model();
	
} # interface
