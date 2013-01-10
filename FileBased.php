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
interface Filebased # stable
{
	/**
	 * @param string file
	 * @return static $this
	 */
	function file_is($file);

	/**
	 * @param string explicit file path
	 * @return static $this
	 */
	function file_path($file);

	/**
	 * @return string file path
	 */
	function file();

} # interface
