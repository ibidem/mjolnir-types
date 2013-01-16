<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Application
{
	use \app\Trait_Renderable;
	use \app\Trait_Channeled
		{
			channel_is as private trait_channel_is;
		}

	/**
	 * @var array of \mjolnir\types\Layer
	 */
	protected $layers = null;

	/**
	 * When invoking an application inside another application we don't want
	 * errors to go though recovery but instead simply buble to the parent
	 * application.
	 *
	 * @var boolean
	 */
	protected $recoverymode = false;

	/**
	 * @return static $this
	 */
	static function stack($args)
	{
		$instance = static::instance();

		if (\is_array($args))
		{
			$instance->layers = $args;
		}
		else # args not array
		{
			$instance->layers = \func_get_args();
		}

		return $instance;
	}

	/**
	 * When the channel is set it will be inherited by all layers.
	 *
	 * @return static $this
	 */
	function channel_is(\mjolnir\types\Channel $channel)
	{
		$this->trait_channel_is($channel);

		foreach ($this->layers as $layer)
		{
			$layer->channel_is($channel);
		}

		return $this;
	}

	/**
	 * ...
	 */
	function criticalerror(\Exception $exception)
	{
		\mjolnir\log
			(
				'CriticalError',
				$exception->getMessage(),
				true
			);

		throw $exception;
	}

	/**
	 * Exceptions will initiate recovery mode. If errors occur in the Layers
	 * themselves criticalerror will be invoked.
	 *
	 * @return static $this
	 */
	function recover_exceptions()
	{
		$this->recoverymode = true;
		return $this;
	}

	/**
	 * Throws any exceptions that happens. Use this when instantiating an
	 * Application inside another running Application.
	 *
	 * @return static $this
	 */
	function throw_exceptions()
	{
		$this->recoverymode = false;
		return $this;
	}

} # trait
