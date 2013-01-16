<?php namespace mjolnir\types;

/** 
 * Common Language Interface
 * 
 * [!!] Transactions must support nesting.
 * 
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface SQLDatabase # stable
{
	const KEYSPLIT = ':';
	
	/**
	 * @param string key
	 * @param string statement
	 * @param string language of statement
	 * @return \mjolnir\types\SQLStatement
	 */
	function prepare($key, $statement = null, $lang = null);
	
	/**
	 * @param string 
	 * @return mixed
	 */
	function last_inserted_id($name = null);
	
	/**
	 * Begin transaction.
	 * 
	 * @return \mjolnir\types\SQLDatabase $this
	 */
	function begin();
	
	/**
	 * Commit transaction.
	 * 
	 * @return \mjolnir\types\SQLDatabase $this
	 */
	function commit();
	
	/**
	 * Rollback transaction.
	 * 
	 * @return \mjolnir\types\SQLDatabase $this
	 */
	function rollback();
	
} # interface
