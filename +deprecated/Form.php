<?php namespace mjolnir\types;

/** 
 * Common Language Interface
 * 
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Form
{
	/**
	 * @return string 
	 */
	function form_id();
	
	/**
	 * @param string key 
	 * @return array|null errors
	 */
	function errors_for($key);
	
	/**
	 * @param string template
	 * @return \mjolnir\types\Form $this
	 */
	function field_template($template);
	
	/**
	 * @param array field errors
	 * @return \mjolnir\types\Form $this
	 */
	function errors(array & $errors = null);
	
	/**
	 * @param string $method
	 * @return \mjolnir\types\Form $this
	 */
	function method($method);
	
	/**
	 * @param string action
	 * @return \mjolnir\types\Form $this
	 */
	function action($action);
	
	/**
	 * @return \mjolnir\types\Form $this
	 */
	function insecure();
	
	/**
	 * @return \mjolnir\types\Form $this
	 */
	function secure();
	
	/**
	 * @param string legend
	 * @return string
	 */
	function group($legend);
	
	/**
	 * End of group.
	 * 
	 * @return string
	 */
	function end();
	
	/**
	 * @return string 
	 */
	function open();
	
	/**
	 * @return string 
	 */
	function close();
	
} # interface
