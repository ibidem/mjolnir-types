<?php namespace kohana4\types;

/** 
 * Common Language Interface
 * 
 * @package    Kohana4
 * @category   Types
 * @author     Kohana Team
 * @copyright  (c) 2008-2012 Kohana Team
 * @license    http://kohanaframework.org/license
 */
interface SQLStatement
{
	/**
	 * @param string parameter
	 * @param string variable
	 * @return $this
	 */
	function bind($parameter, & $variable);
	
	/**
	 * @param string parameter
	 * @param int variable
	 * @return $this
	 */
	function bindInt($parameter, & $variable);
	
	/**
	 * Stored procedure argument.
	 * 
	 * @param string parameter
	 * @param string variable
	 * @return $this
	 */
	function bindArg($parameter, & $variable);
	
	/**
	 * Execute the statement.
	 * 
	 * @return $this
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
