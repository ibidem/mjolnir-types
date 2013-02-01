<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface SQLStatement extends Executable, Paged
{
	// ------------------------------------------------------------------------
	// Basic assignment

	/**
	 * @return static $this
	 */
	function str($param, $value);

	/**
	 * @return static $this
	 */
	function num($param, $value);

	/**
	 * @return static $this
	 */
	function bool($param, $value, array $map = null);

	/**
	 * @return static $this
	 */
	function date($param, $value);

	// ------------------------------------------------------------------------
	// Basic Binding

	/**
	 * @return static $this
	 */
	function bindstr($param, &$variable);

	/**
	 * @return static $this
	 */
	function bindnum($param, &$variable);

	/**
	 * @return static $this
	 */
	function bindbool($param, &$variable);

	/**
	 * @return static $this
	 */
	function binddate($param, &$variable);

	// ------------------------------------------------------------------------
	// Multi-assignment

	/**
	 * @return static $this
	 */
	function strs(array $params, array $filter = null);

	/**
	 * @return static $this
	 */
	function nums(array $params, array $filter = null);

	/**
	 * @return static $this
	 */
	function bools(array $params, array $filter = null, array $map = null);

	/**
	 * @return static $this
	 */
	function dates(array $params, array $filter = null);

	// ------------------------------------------------------------------------
	// Multi binding

	/**
	 * @return static $this
	 */
	function bindstrs(array &$params, array $filter = null);

	/**
	 * @return static $this
	 */
	function bindnums(array &$params, array $filter = null);

	/**
	 * @return static $this
	 */
	function bindbools(array &$params, array $filter = null);

	/**
	 * @return static $this
	 */
	function binddates(array &$params, array $filter = null);

	// ------------------------------------------------------------------------
	// Stored procedure arguments

	/**
	 * @return static $this
	 */
	function arg($param, &$variable);

	/**
	 * @return static $this
	 */
	function args(array &$params, array $filter = null);

	// ------------------------------------------------------------------------
	// Retrieval

	/**
	 * Featch as object, given a class and a set of parameters to be passed
	 * to the constructor of said class.
	 *
	 * @return mixed
	 */
	function fetch_object($class = 'stdClass', array $args = null);

	/**
	 * Fetch first row as associative array.
	 *
	 * @return array or null
	 */
	function fetch_entry(array $formatinfo = null);

	/**
	 * Retrieves all rows. Rows are retrieved as arrays.
	 *
	 * @return array
	 */
	function fetch_all(array $formatinfo = null);

} # interface
