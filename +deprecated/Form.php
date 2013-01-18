<?php namespace mjolnir\types;

/**
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
	function formid();
	
	/**
	 * @param string key 
	 * @return array|null errors
	 */
	function errorfor($key);
	
	/**
	 * @param string template
	 * @return \mjolnir\types\Form $this
	 */
	function fieldtemplate($template);
	
	/**
	 * @param array field errors
	 * @return \mjolnir\types\Form $this
	 */
	function errors_using(array & $errors = null);
	
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
