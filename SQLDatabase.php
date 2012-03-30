<?php namespace kohana4\types;

/** 
 * Common Language Interface
 * 
 * [!!] Transactions must support nesting.
 * 
 * @package    Kohana4
 * @category   Types
 * @author     Kohana Team
 * @copyright  (c) 2008-2012 Kohana Team
 * @license    http://kohanaframework.org/license
 */
interface SQLDatabase
{
	const KEYSPLIT = ':';
	
	/**
	 * @param string key
	 * @param string statement
	 * @param string language of statement
	 * @return \kohana4\types\SQLStatement
	 */
	function prepare($key, $statement = null, $lang = null);
	
	/**
	 * Begin transaction.
	 * 
	 * @return $this
	 */
	function begin();
	
	/**
	 * Commit transaction.
	 * 
	 * @return $this
	 */
	function commit();
	
	/**
	 * Rollback transaction.
	 * 
	 * @return $this
	 */
	function rollback();
	
} # interface
