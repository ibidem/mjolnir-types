<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Filebased
{
	/**
	 * @return static $this
	 */
	function file_is($file, $ext = null);

	/**
	 * @return static $this
	 */
	function file_path($filepath);

	/**
	 * @return string absolute file path
	 */
	function filepath();

} # interface
