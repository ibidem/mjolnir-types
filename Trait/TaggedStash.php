<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_TaggedStash
{
	/**
	 * @var string
	 */
	protected static $tag_stash_key = '___stash_tag_reference';

	/**
	 * Tags the data key for reference.
	 *
	 * @return static $this
	 */
	function store($key, $data, array $tags = [], $expires = null)
	{
		$tag_stash = static::get(static::$tag_stash_key);
		isset($tag_stash) or $tag_stash = [];

		// stash data
		static::set($key, $data, $expires);
		// stash tags for the key
		foreach ($tags as $tag)
		{
			if (isset($tag_stash[$tag]))
			{
				$tag_stash[$tag][] = $key;
			}
			else # tag stash for tag not set
			{
				$tag_stash[$tag] = [$key];
			}
		}

		static::set(static::$tag_stash_key, $tag_stash);

		return $this;
	}

	/**
	 * Removes cache entries tagged with specified tags.
	 *
	 * @return static $this
	 */
	function purge(array $tags)
	{
		$tag_stash = static::get(static::$tag_stash_key);

		isset($tag_stash) or $tag_stash = [];

		foreach ($tags as $tag)
		{
			if (isset($tag_stash[$tag]))
			{
				foreach ($tag_stash[$tag] as $key)
				{
					static::delete($key);
				}

				unset($tag_stash[$tag]);
			}
		}

		static::set(static::$tag_stash_key, $tag_stash);

		return $this;
	}

	/**
	 * When timers is not provided the timers are retrieved automatically from
	 * the model. (timers act as invalidators for the stash)
	 *
	 * Model must be provided in proper case. No prefix.
	 *
	 * @return array tags for given parameters
	 */
	function tags($model, array $timers = null)
	{
		return \app\Stash::tags($model, $timers);
	}

} # trait
