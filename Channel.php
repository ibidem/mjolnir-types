<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Channel extends Meta, Renderable
{
	/**
	 * @return string
	 */
	function status();

	/**
	 * @return static $this
	 */
	function status_is($status);

} # interface
