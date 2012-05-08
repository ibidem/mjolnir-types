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
interface SQLStatement
{
	/**
	 * @param string parameter
	 * @param string constant
	 * @return \ibidem\types\SQLStatement $this 
	 */
	function set($parameter, $constant);
	
	/**
	 * @param string parameter
	 * @param string constant
	 * @return \ibidem\types\SQLStatement $this 
	 */
	function set_int($parameter, $constant);
	
	/**
	 * @param string parameter
	 * @param string constant
	 * @return \ibidem\base\SQLStatement $this 
	 */
	function set_bool($parameter, $constant);
	
	/**
	 * @param string parameter
	 * @param string constant
	 * @return \ibidem\base\SQLStatement $this 
	 */
	function set_date($parameter, $constant);
	
	/**
	 * @param array keys
	 * @param array values
	 * @return \ibidem\types\SQLStatement $this 
	 */
	function mass_set(array $keys, array $values);
	
	/**
	 * @param array keys
	 * @param array values
	 * @param array key map (eg. 'true_key' => true, 'false_key' => false ... )
	 * @return \ibidem\types\SQLStatement $this 
	 */
	function mass_bool(array $keys, array $values, array $map);
	
	/**
	 * @param array keys
	 * @param array values
	 * @return \ibidem\types\SQLStatement $this 
	 */
	public function mass_int(array $keys, array $values);
	
	/**
	 * @param string parameter
	 * @param string variable
	 * @return \ibidem\types\SQLStatement $this
	 */
	function bind($parameter, & $variable);
	
	/**
	 * @param string parameter
	 * @param int variable
	 * @return \ibidem\types\SQLStatement $this
	 */
	function bind_int($parameter, & $variable);
	
	/**
	 * Stored procedure argument.
	 * 
	 * @param string parameter
	 * @param string variable
	 * @return \ibidem\types\SQLStatement $this
	 */
	function bind_arg($parameter, & $variable);
	
	/**
	 * Execute the statement.
	 * 
	 * @return \ibidem\types\SQLStatement $this
	 */
	function execute();
	
	/**
	 * Featch as object.
	 */
	function fetch_object();
	
	/**
	 * Fetch associative array of row.
	 */
	function fetch_array();
	
	/**
	 * Retrieves all remaining rows. Rows are retrieved as arrays.
	 * 
	 * [!!] May be extremely memory intensive when used on large data sets.
	 */
	function fetch_all();
	
} # interface
