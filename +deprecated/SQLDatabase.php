<?php namespace mjolnir\types;

/** 
 * [!!] Transactions must support nesting.
 * 
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface SQLDatabase
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
	 * @return static $this
	 */
	function begin();
	
	/**
	 * Commit transaction.
	 * 
	 * @return static $this
	 */
	function commit();
	
	/**
	 * Rollback transaction.
	 * 
	 * @return static $this
	 */
	function rollback();
	
} # interface
