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
interface Writable # stable
{
	/**
	 * @return static $this
	 */
	function writer_is(\mjolnir\types\Writer $writer);

} # interface
