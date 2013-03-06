<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_HTMLFormField_AjaxUploader
{
	#
	# HTMLFormField_Composite is derived from HTMLFormField therefore we do not
	# inherit the trait of HTMLFormField since this class is suppose to extend
	# a HTMLFormField class therefore having it already
	#

	use \app\Trait_Channeled;

	/**
	 * @var \app\HTMLFormField_Hidden
	 */
	protected $input;
	
	/**
	 * @var string
	 */
	protected $langprefix;

	/**
	 * @var \mjolnir\types\HTMLTag
	 */
	protected $preview;
	
	/**
	 * @return static $this
	 */
	function initialize()
	{
		static $initialized = false;
		
		if ( ! $initialized)
		{
			$this->input = $this->form()->hidden($this->get('name'));

			$autocomplete = $this->form()->autovalue($this->get('name'));

			if ($autocomplete !== null)
			{
				$this->input->value_is($autocomplete);
			}

			$this->preview = $this->makepreview();
			
			$initialized = true;
		}
		
		return $this;
	}
		
	/**
	 * Output a preview.
	 *
	 * @return \mjolnir\types\HTMLTag
	 */
	function preview()
	{
		$this->initialize();
		return $this->preview;
	}

	// ------------------------------------------------------------------------
	// etc
	
	/**
	 * Setup ajax depedencies.
	 */
	protected function ajax_dependencies()
	{
		static $included = false;
		
		// avoid multiple inclusions on multiple fields
		if ( ! $included)
		{		
			$channel = $this->channel();

			if ($this->channel() === null)
			{
				throw new \app\Exception('A channel is required for rendering '.__CLASS__);
			}

			/* @var $htmllayer \app\Layer_HTML */
			$htmllayer = $channel->get('layer:html');

			if ($htmllayer === null)
			{
				throw new \app\Exception('Rendering outside of a HTML context not supported. Please check the layer stack.');
			}

			$htmllayer->add
				(
					'script',
					[
						'type' => 'application/javascript',
						'src' => \app\URL::href
							(
								'mjolnir:theme/themedriver/javascript.route',
								[
									'theme'   => 'mjolnir/html',
									'version' => \app\Theme::instance()->version(),
									'target'  => 'qq-uploader',
								]
							)
					]
				);

			$htmllayer->add
				(
					'stylesheet',
					[
						'type' => 'text/css',
						'href' => \app\URL::href
							(
								'mjolnir:theme/themedriver/style.route',
								[
									'theme'   => 'mjolnir/html',
									'style'   => 'utilities',
									'version' => \app\Theme::instance()->version(),
									'target'  => 'qq-uploader',
								]
							)
					]
				);
			
			$included = true;
		}
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
	
	// ------------------------------------------------------------------------
	// interface: Renderable

	/**
	 * @return string
	 */
	function fieldrender()
	{
		$this->initialize();
		return $this->wrapper()->render();
	}

} # trait
