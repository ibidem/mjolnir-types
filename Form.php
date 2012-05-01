<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * @package    ibidem
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
	 * @return \ibidem\types\Form $this
	 */
	function field_template($template);
	
	/**
	 * @param array field errors
	 * @return \ibidem\types\Form $this
	 */
	function errors(array & $errors = null);
	
	/**
	 * @param string $method
	 * @return \ibidem\types\Form $this
	 */
	function method($method);
	
	/**
	 * @param string action
	 * @return \ibidem\types\Form $this
	 */
	function action($action);
	
	/**
	 * @return \ibidem\types\Form $this
	 */
	function insecure();
	
	/**
	 * @return \ibidem\types\Form $this
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
