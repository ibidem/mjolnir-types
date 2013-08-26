<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface HTMLFormField_Switch extends HTMLFormField
{
	/**
	 * @return static $this
	 */
	function checked();

	/**
	 * @return static $this;
	 */
	function unchecked();

	/**
	 * @return static $this
	 */
	function checked_state($state);

} # interface