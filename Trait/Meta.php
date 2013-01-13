<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Meta
{
	/**
	 * @var array
	 */
	protected $metadata = null;

	/**
	 * @return mixed
	 */
	function get($name, $default = null)
	{
		return isset($this->metadata[$name]) ? $this->metadata[$name] : $default;
	}

	/**
	 * @return static $this
	 */
	function set($name, $value)
	{
		$this->metadata[$name] = $value;
		return $this;
	}

	/**
	 * @return static $this
	 */
	function add($name, $value)
	{
		$this->metadata[$name][] = $value;
		return $this;
	}

} # trait
