<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Renderable
{
	/**
	 * @var array of keyed callables
	 */
	protected $metarenderers = null;
	
	/**
	 * Registers a function that may be used in the rendering process. If such a
	 * function is used and how it is used is based on the implementation and 
	 * context of the class.
	 *
	 * @return static $this
	 */
	function addmetarenderer($key, callable $metarenderer)
	{
		$this->metarenderers[$key] = $metarenderer;
		return $this;
	}
	
	/**
	 * @return callable
	 */
	function metarenderer($key, $default = null)
	{
		if (isset($this->metarenderers, $this->metarenderers[$key]))
		{
			return $this->metarenderers[$key];
		}
		
		return $default;
	}
	
	/**
	 * See: addrenderhelper above
	 * 
	 * Mass inject array of render helpers.
	 * 
	 * @return static $this
	 */
	function injectmetarenderers(array $metarenderers = null)
	{
		if ($metarenderers === null)
		{
			return $this;
		}
		
		if ($this->metarenderers === null)
		{
			$this->metarenderers = $metarenderers;
		}
		else # we have existing render helpers
		{
			foreach ($metarenderers as $key => $helper)
			{
				$this->metarenderers[$key] = $helper;
			}
		}
		
		return $this;
	}
	
	/**
	 * @deprecated always use the render method!
	 */
	function __toString()
	{
		// Renderables may contain logic, by allowing __toString not only does
		// Exception handling become unnecesarily complicated because of how
		// this special method can't throw exceptions, it also ruins the entire
		// stack by throwing the exception in a completely undefined manner,
		// ie. whenever it decides to convert to a string. Not worth the few
		// characters it saves.
		
		// Exception: very small classes that beneifit greatly from autocasting, 
		// can't completely break the page if they bork, and have easy to manage
		// predictable logic may overwrite this to allow auto-rendering on the
		// basis that the likelyhood of them breaking is close to zero and when
		// they are used in way which might break a page the programmer will 
		// avoid __toString and use render for the particular case.

		// diagnose
		$trace = \debug_backtrace();
		$caller = \array_shift($trace);
		$debuginfo = "Called by {$caller['function']}";

		if (isset($caller['class']))
		{
			$debuginfo .= " in {$caller['class']}";
		}

		\mjolnir\log
			(
				'Error',
				"Casting to string not allowed! $debuginfo"
			);

		if (\app\CFS::config('mjolnir/base')['development'])
		{
			// emmit catchable fatal error; note that this will need to be converted
			// to an exception by a error handler set via \set_error_handler before
			// it can be catchable by an external try / catch
			return null;
		}
		else # production
		{
			return $this->render();
		}
	}

} # trait
