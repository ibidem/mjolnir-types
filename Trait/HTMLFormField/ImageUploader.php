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
	protected $langprefix;

	/**
	 * @var string
	 */
	protected $imageurl = null;

	/**
	 * @var \mjolnir\types\HTMLTag
	 */
	protected $preview;
	
	/**
	 * @var array
	 */
	protected $previewsize = [ 100, 100 ];

	/**
	 * @return static $this
	 */
	function initialize()
	{
		$this->input = $this->form()->hidden($this->get('name'));

		$autocomplete = $this->form()->autovalue($this->get('name'));
		
		if ($autocomplete !== null)
		{
			$this->input->value_is($autocomplete);
		}

		$this->preview = \app\HTMLTag::i('img')
			->set('id', $this->input->get('id').'_preview')
			->set('alt', '') # an empty value is the correct value
			->set('src', $this->imageurl);

		return $this;
	}

	/**
	 * Set the preview image.
	 *
	 * @return static $this
	 */
	function image_is($imageurl)
	{
		$this->imageurl = $imageurl;
		$this->preview->set
			(
				'src', 
				\app\URL::href
					(
						'mjolnir:thumbnail.route', 
						[ 
							'image'  => \app\CFS::config('mjolnir/base')['path'].$imageurl, 
							'width'  => $this->previewsize[0],
							'height' => $this->previewsize[1],
						]
					)
			);

		return $this;
	}

	/**
	 * Output a preview.
	 *
	 * @return \mjolnir\types\HTMLTag
	 */
	function preview()
	{
		return $this->preview;
	}

	/**
	 * @return static $this
	 */
	function previewsize($width, $height)
	{
		$this->previewsize = [ $width, $height ];
		
		if ($this->imageurl !== null)
		{
			$this->preview->set
				(
					'src', 
					\app\URL::href
						(
							'mjolnir:thumbnail.route', 
							[ 
								'image'  => \app\CFS::config('mjolnir/base')['path'].$this->imageurl, 
								'width'  => $width,
								'height' => $height,
							]
						)
				);
		}
		
		$this->preview->set('width', $width);
		$this->preview->set('height', $width);

		$this->wrapper()
			->set('data-preview-width', $width)
			->set('data-preview-height', $height);

		return $this;
	}

	// ------------------------------------------------------------------------
	// interface: Eloquent

	/**
	 * @return static $this
	 */
	function langprefix_is($langprefix)
	{
		$this->langprefix = $langprefix;
		return $this;
	}

	/**
	 * @return string
	 */
	function langprefix($default_langprefix)
	{
		return $this->langprefix !== null ? $this->langprefix : $default_langprefix;
	}

} # trait
