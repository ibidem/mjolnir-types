<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface HTMLFormField_AjaxUploader extends Channeled, HTMLFormField
{
	/**
	 * @return static $this
	 */
	function wrapper();
	
	/**
	 * Output a preview.
	 * 
	 * @return \mjolnir\types\HTMLTag
	 */
	function preview();
	
} # interface