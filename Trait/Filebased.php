<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Filebased
{
	/**
	 * @var string
	 */
	protected $filepath;

	/**
	 * @return static $this
	 */
	function file_path($filepath)
	{
		$this->filepath = $filepath;
		return $this;
	}

	/**
	 * @return string absolute file path
	 */
	function filepath()
	{
		return $this->filepath;
	}

} # trait
