<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * @package    ibidem
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface TaggedStash # stable
{
	/**
	 * Stores data in $key, tagged with tags.
	 */
	static function store($key, $data, array $tags = [], $expires = null);

	/**
	 * Deletes all caches tagged with $tags
	 */
	static function purge(array $tags);

	/**
	 * When timers is not provided the timers are retrieved automatically from 
	 * the model. (timers act as invalidators for the stash)
	 * 
	 * Model must be provided in proper case. No prefix.
	 * 
	 * @return array tags for given parameters
	 */
	static function tags($model, array $timers = null);

} # interface