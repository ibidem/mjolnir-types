<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Writer
{
	use \app\Trait_Meta;

	/**
	 * @var array
	 */
	protected $writer_formats = null;

	/**
	 * @return static $this
	 */
	function eol()
	{
		\fprintf($this->stdout, PHP_EOL);
		return $this;
	}

	/**
	 * @return string
	 */
	function eolstring()
	{
		return PHP_EOL;
	}

	/**
	 * @return static $this
	 */
	function writef($format)
	{
		$args = \func_get_args();
		\array_unshift($args, $this->stdout);
		\call_user_func_array('fprintf', $args);

		return $this;
	}

	/**
	 * @return static $this
	 */
	function stderr_writef($format)
	{
		$args = \func_get_args();

		if ($this->stderr !== null)
		{
			\array_unshift($args, $this->stderr);
		}
		else # stderr not defined
		{
			\array_unshift($args, $this->stdout);
		}

		\call_user_func_array('fprintf', $args);

		return $this;
	}

	/**
	 * Write using given format.
	 *
	 * @return static $this
	 */
	function printf($format)
	{
		if ( ! isset($this->writer_formats[$format]))
		{
			throw new \Exception("Unknown writing format [$format].");
		}

		$args = \func_get_args();
		$args[0] = $this;
		\call_user_func_array($this->writer_formats[$format], $args);

		return $this;
	}

	/**
	 * @return static $this
	 */
	function addformat($format, callable $formatter)
	{
		$this->writer_formats[$format] = $formatter;
		return $this;
	}

	/**
	 * @return static $this
	 */
	function stdout_is($resource)
	{
		$this->stdout = $resource;
		return $this;
	}

	/**
	 * @return resource
	 */
	function stdout()
	{
		return $this->stdout;
	}

	/**
	 * @return static $this
	 */
	function stderr_is($resource)
	{
		$this->stderr = $resource;
		return $this;
	}

	/**
	 * @return resource
	 */
	function stderr()
	{
		return $this->stderr;
	}

} # trait
