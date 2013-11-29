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
	function strs(array $params, array $filter = null, $varkey = ':');

	/**
	 * @return static $this
	 */
	function nums(array $params, array $filter = null, $varkey = ':');

	/**
	 * @return static $this
	 */
	function bools(array $params, array $filter = null, array $map = null, $varkey = ':');

	/**
	 * @return static $this
	 */
	function dates(array $params, array $filter = null, $varkey = ':');

	// ------------------------------------------------------------------------
	// Multi binding

	/**
	 * @return static $this
	 */
	function bindstrs(array &$params, array $filter = null, $varkey = ':');

	/**
	 * @return static $this
	 */
	function bindnums(array &$params, array $filter = null, $varkey = ':');

	/**
	 * @return static $this
	 */
	function bindbools(array &$params, array $filter = null, $varkey = ':');

	/**
	 * @return static $this
	 */
	function binddates(array &$params, array $filter = null, $varkey = ':');

	// ------------------------------------------------------------------------
	// Stored procedure arguments

	/**
	 * @return static $this
	 */
	function arg($param, &$variable);

	/**
	 * @return static $this
	 */
	function args(array &$params, array $filter = null, $varkey = ':');

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
	 * @return array|null
	 */
	function fetch_entry(array $formatinfo = null);

	/**
	 * Shorthand for retrieving value from a querie that performs a COUNT, SUM
	 * or some other calculation.
	 *
	 * Some calculations such as a SUM on a table with no rows will return null,
	 * so to mitigate this you can specify an overwrite for the null value.
	 *
	 * @return mixed
	 */
	function fetch_calc($on_null = null);

	/**
	 * Retrieves all rows. Rows are retrieved as arrays.
	 *
	 * @return array[]
	 */
	function fetch_all(array $formatinfo = null);

	// ------------------------------------------------------------------------
	// Helpers

	/**
	 * Before being submitted all placeholders will be replaced in the
	 * statement. The external vars assignment allows for statements to be
	 * written in a very consistent easy to read way.
	 *
	 * This method always ADDs more placeholders. It doesn't have an "add" in
	 * the name for bravety.
	 *
	 * [!!] vars WILL/SHOULD never do any sanitation of the input and SHOULD
	 * NEVER be used for actual input
	 *
	 * Rule of Thumb: If it's a internal system variable (eg. table name,
	 * special column name) use vars and place it in brackets to denote it's
	 * both not sanitized and also that it's NOT user input.
	 *
	 * eg.
	 *
	 *      SELECT entry.*
	 *        FROM `[products]` entry
	 *       WHERE entry.[lft] < :target_lft
	 *         AND entry.[rgt] > :target_rgt
	 *
	 *  [
	 *      '[products]' => \app\ProductsLib::table(),
	 *      '[lft]' => static::tree_lft(),
	 *      '[rgt]' => static::tree_rgt(),
	 *  ]
	 *
	 * @return static $this
	 */
	function vars(array $placeholders);

} # interface
