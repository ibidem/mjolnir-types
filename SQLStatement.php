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
	 * @param string variable
	 * @return \ibidem\types\SQLStatement $this
	 */
	function bind($parameter, & $variable);
	
	/**
	 * @param string parameter
	 * @param int variable
	 * @return \ibidem\types\SQLStatement $this
	 */
	function bindInt($parameter, & $variable);
	
	/**
	 * Stored procedure argument.
	 * 
	 * @param string parameter
	 * @param string variable
	 * @return \ibidem\types\SQLStatement $this
	 */
	function bindArg($parameter, & $variable);
	
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
