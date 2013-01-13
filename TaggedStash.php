<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface TaggedStash
{
	/**
	 * Stores data in $key, tagged with tags.
	 */
	function store($key, $data, array $tags = null, $expires = null);

	/**
	 * Deletes all caches tagged with $tags
	 */
	function purge(array $tags);

	/**
	 * When timers is not provided the timers are retrieved automatically from
	 * the model. (timers act as invalidators for the stash)
	 *
	 * Model must be provided in proper case. No prefix.
	 *
	 * @return array tags for given parameters
	 */
	function tags($entity, array $timers = null);

} # interface
