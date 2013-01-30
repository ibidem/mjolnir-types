<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface HTMLFormField_Composite extends HTMLFormField
{
	/**
	 * @return static $this
	 */
	function addfield(\mjolnir\types\HTMLFormField $field);
	
} # interface