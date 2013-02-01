<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Theme
{
	use \app\Trait_Channeled;
	use \app\Trait_Meta;

	/**
	 * @return $this
	 */
	function themename_is($themename)
	{
		$this->set('themename', $themename);
		return $this;
	}
	
	/**
	 * @return $this
	 */
	function themepath_is($themepath)
	{
		$this->set('themepath', $themepath);
		return $this;
	}
	
	/**
	 * @return $this
	 */
	function themepath_for($theme)
	{
		$corethemes = static::corethemes();
		$this->set('themepath', $corethemes[$theme]);
		
		return $this;
	}
	
} # trait
