<?php namespace mjolnir\types;

/**
 * Common Language Interface
 *
 * @package    mjolnir
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
	 * @return static $this
	 */
	function set($parameter, $constant);

	/**
	 * @param string parameter
	 * @param string constant
	 * @return static $this
	 */
	function set_int($parameter, $constant);

	/**
	 * @param string parameter
	 * @param string constant
	 * @return static $this
	 */
	function set_bool($parameter, $constant);

	/**
	 * @param string parameter
	 * @param string constant
	 * @return static $this
	 */
	function set_date($parameter, $constant);

	/**
	 * @param array keys
	 * @param array values
	 * @return static $this
	 */
	function mass_set(array $keys, array $values);

	/**
	 * @param array keys
	 * @param array values
	 * @param array key map (eg. 'true_key' => true, 'false_key' => false ... )
	 * @return static $this
	 */
	function mass_bool(array $keys, array $values, array $map);

	/**
	 * @param array keys
	 * @param array values
	 * @return static $this
	 */
	function mass_int(array $keys, array $values);

	/**
	 * @param string parameter
	 * @param string variable
	 * @return static $this
	 */
	function bind($parameter, & $variable);

	/**
	 * @param string parameter
	 * @param int variable
	 * @return static $this
	 */
	function bind_int($parameter, & $variable);

	/**
	 * @param string paramter
	 * @param string variable
	 * @return static $this
	 */
	function bind_date($parameter, & $variable);

		/**
	 * @param string paramter
	 * @param string variable
	 * @return static $this
	 */
	function bind_bool($parameter, & $variable);

	/**
	 * Stored procedure argument.
	 *
	 * @param string parameter
	 * @param string variable
	 * @return static $this
	 */
	function bind_arg($parameter, & $variable);

	/**
	 * Execute the statement.
	 *
	 * @return static $this
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
	 * Retrieves all rows. Rows are retrieved as arrays.
	 */
	function fetch_all();

} # interface
