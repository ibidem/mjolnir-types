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
interface Writer # stable
{
	/**
	 * @return \mjolnir\types\Writer $this
	 */
	function eol();

	/**
	 * @return string EOL as string
	 */
	function eolstring();

	/**
	 * @param string format
	 * @return \mjolnir\types\Writer $this
	 */
	function writef($format);

} # interface
