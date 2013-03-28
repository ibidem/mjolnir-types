<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Channeled
{
	/**
	 * @var \mjolnir\types\Channel
	 */
	protected $channel = null;

	/**
	 * @return static $this
	 */
	function channel_is(\mjolnir\types\Channel $channel = null)
	{
		$this->channel = $channel;
		return $this;
	}

	/**
	 * @return \mjolnir\types\Channel
	 */
	function channel()
	{
		return $this->channel;
	}

} # traits
