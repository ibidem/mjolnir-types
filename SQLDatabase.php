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
	 * Example
	 *
	 *  $db->prepare
	 *      (
	 *          '
	 *              SELECT entry.*
	 *                FROM `customers` entry
	 *          '
	 *     );
	 *
	 * @return \mjolnir\types\SQLStatement
	 */
	function prepare($statement = null);

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
