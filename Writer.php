<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Writer extends Meta
{
	/**
	 * @return static $this
	 */
	function eol();

	/**
	 * @return string
	 */
	function eolstring();

	/**
	 * @return static $this
	 */
	function writef($format);

	/**
	 * @return static $this
	 */
	function stderr_writef($format);

	/**
	 * Write using given format.
	 *
	 * @return static $this
	 */
	function printf($format);

	/**
	 * @return static $this
	 */
	function addformat($format, callable $formatter);

	/**
	 * @return static $this
	 */
	function stdout_is($resource);

	/**
	 * @return resource
	 */
	function stdout();

	/**
	 * @return static $this
	 */
	function stderr_is($resource);

	/**
	 * @return resource
	 */
	function stderr();

} # interface
