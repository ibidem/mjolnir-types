<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface SQLStatement extends Executable
{
	/**
	 * @return static $this
	 */
	function set($parameter, $constant, $type = 'string');
	
	/**
	 * @return static $this
	 */
	function bind($parameter, & $variable, $type = 'string');

	/**
	 * Featch as object, given a class and a set of parameters to be passed
	 * to the constructor of said class.
	 * 
	 * @return mixed
	 */
	function fetch_object($class = 'stdClass', array $args = null);

	/**
	 * Fetch row as associative array.
	 * 
	 * @return array
	 */
	function fetch_entry(array $formatinfo = null);

	/**
	 * Retrieves all rows. Rows are retrieved as arrays.
	 * 
	 * @return array
	 */
	function fetch_all(array $formatinfo = null);

} # interface
