<?php namespace mjolnir\types;

/**
 * PROTOTYPE - subject to change
 * 
 * A MarionetteModel is a model that's specifically designed to work well with 
 * RESTful apis.
 * 
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface MarionetteModel extends Marionette
{
	/**
	 * Retrieve collection members.
	 * 
	 * @return array
	 */
	function get($id);
	
	/**
	 * Replace entry.
	 * 
	 * @return static $this
	 */
	function put($id, $entry);
	
	/**
	 * Update specified fields in entry.
	 * 
	 * @return static $this
	 */
	function patch($id, $partial_entry);
		
	/**
	 * Delete entry.
	 * 
	 * @return static $this
	 */
	function delete($id);

} # interface
