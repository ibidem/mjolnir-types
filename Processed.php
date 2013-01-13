<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Processed
{
	/**
	 * @return static $this
	 */
	function add_preprocessor($name, callable $processor);

	/**
	 * @return static $this
	 */
	function add_postprocessor($name, callable $processor);

	/**
	 * @return static $this
	 */
	function preprocess();

	/**
	 * @return static $this
	 */
	function postprocess();

} # interface
