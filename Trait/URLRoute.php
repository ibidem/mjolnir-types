<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_URLRoute
{
	use \app\Trait_Meta;
	use \app\Trait_Contextual;
	use \app\Trait_Linkable;
	use \app\Trait_Matcher;

	/**
	 * @var string
	 */
	protected $urlbase = null;

	/**
	 * @return static $this
	 */
	function urlbase_is($urlbase)
	{
		$this->urlbase = $urlbase;
		return $this;
	}

	/**
	 * @return string
	 */
	function urlbase()
	{
		return $this->urlbase;
	}

} # trait
