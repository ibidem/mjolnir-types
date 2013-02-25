<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Theme
{
	use \app\Trait_Channeled
		{
			channel_is as protected Channeled_channel_is;
		}
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
	 * @return string
	 */
	function themename()
	{
		return $this->get('themename');
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
		if (isset($corethemes[$theme]))
		{
			$this->set('themepath', $corethemes[$theme]);
		}
		else # embeded theme
		{
			$themedir = \app\CFS::dir("themes/$theme");
			if ($themedir !== null)
			{
				$this->set('themepath', $themedir);
			}
			else # no theme
			{
				throw new \app\Exception("Theme [$theme] could not be found in the environment or modules.");
			}
		}

		return $this;
	}

	/**
	 * @return string or null
	 */
	function themepath()
	{
		return $this->get('themepath', null);
	}

	// ------------------------------------------------------------------------
	// interface: Channeled

	/**
	 * @return static $this
	 */
	function channel_is(\mjolnir\types\Channel $channel)
	{
		$channel->set('theme', $this);
		$this->Channeled_channel_is($channel);
		
		return $this;
	}

} # trait
