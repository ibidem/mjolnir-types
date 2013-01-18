<?php namespace mjolnir\types;

/** 
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface SQLDatabase
{
	/**
	 * Default split between key parts (ie. namespace and some identifier)
	 * 
	 * @var string
	 */
	const keysplit = ':';
	
	/**
	 * The key is usually __METHOD__ but any key may be provided so long as
	 * it accuratly identifies the method. 
	 * 
	 * eg.
	 * 
	 *     $db->prepare(__METHOD__, 'SELECT * FROM customers');
	 *     $db->prepare(__METHOD__.':users', 'SELECT * FROM users');
	 * 
	 * The : in ':users' above is the keysplit.
	 * 
	 * @return \mjolnir\types\SQLStatement
	 */
	function prepare($key, $statement = null, $lang = null);
	
	/**
	 * @return string quoted version
	 */
	function quote($value);
	
	/**
	 * @param string 
	 * @return mixed
	 */
	function last_inserted_id($name = null);
	
	# [!!] all transactions must support nesting
	
	/**
	 * Start new transaction or savepoint.
	 * 
	 * @return static $this
	 */
	function begin();
	
	/**
	 * Commit transaction or savepoint.
	 * 
	 * @return static $this
	 */
	function commit();
	
	/**
	 * Rollback transaction or savepoint.
	 * 
	 * @return static $this
	 */
	function rollback();
	
} # interface
