<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Writable
{
	/**
	 * @return static $this
	 */
	function writer_is(\mjolnir\types\Writer $writer);

	/**
	 * @return \mjolnir\types\Writer
	 */
	function writer();

} # interface
