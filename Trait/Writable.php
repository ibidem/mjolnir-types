<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Writable
{
	/**
	 * @var \mjolnir\types\Writer
	 */
	protected $writer = null;

	/**
	 * @return static $this
	 */
	function writer_is(\mjolnir\types\Writer $writer)
	{
		$this->writer = $writer;
		return $this;
	}

	/**
	 * @return \mjolnir\types\Writer
	 */
	function writer()
	{
		return $this->writer;
	}

} # trait
