<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface HTMLFormField_ImageUploader extends Channeled, HTMLFormField
{
	/**
	 * Output a preview.
	 * 
	 * @return \mjolnir\types\HTMLTag
	 */
	function preview();
	
	/**
	 * Set the preview image.
	 * 
	 * @return \mjolnir\types\HTMLFormField_ImageUploader $this
	 */
	function image_is($imageurl);
	
} # interface