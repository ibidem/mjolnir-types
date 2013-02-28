<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_HTMLFormField_ImageUploader
{
	#
	# HTMLFormField_Composite is derived from HTMLFormField therefore we do not
	# inherit the trait of HTMLFormField since this class is suppose to extend
	# a HTMLFormField class therefore having it already
	#
	
	use \app\Trait_Channeled;
	
	/**
	 * @var string
	 */
	protected $imageurl = '#';
	
	/**
	 * Set the preview image.
	 * 
	 * @return static $this
	 */
	function image_is($imageurl)
	{
		$this->imageurl = $imageurl;
		return $this;
	}
	
	/**
	 * Output a preview.
	 * 
	 * @return \mjolnir\types\HTMLTag
	 */
	function preview()
	{
		return \app\HTMLTag::i('img')
			->set('alt', '') # an empty value is the correct value
			->set('src', $this->imageurl);
	}
	
} # trait
