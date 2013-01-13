<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Processed
{
	/**
	 * @var array
	 */
	protected $preprocessors = null;

	/**
	 * @var array
	 */
	protected $postprocessors = null;

	/**
	 * @return static $this
	 */
	function add_preprocessor($name, callable $processor)
	{
		$this->preprocessors[$name] = $processor;
		return $this;
	}

	/**
	 * @return static $this
	 */
	function add_postprocessor($name, callable $processor)
	{
		$this->postprocessors[$name] = $processor;
		return $this;
	}

	/**
	 * @return static $this
	 */
	function preprocess()
	{
		if ($this->preprocessors !== null)
		{
			foreach ($this->preprocessors as $process)
			{
				$process();
			}
		}
	}

	/**
	 * @return static $this
	 */
	function postprocess()
	{
		if ($this->postprocessors !== null)
		{
			$process = \end($this->postprocessors);
			if ($process !== false)
			{
				do
				{
					$process();
				}
				while ($process = \prev($this->postprocessors));
			}
		}
	}

} # trait
