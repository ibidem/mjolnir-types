<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_HTMLTag
{
	use \app\Trait_Meta;
	use \app\Trait_Renderable;

	/**
	 * @var string
	 */
	protected $tagname = null;

	/**
	 * @var mixed string or renderable
	 */ 
	protected $tagbody = null;
	
	/**
	 * @return string
	 */
	function tagname()
	{
		return $this->tagname;
	}

	/**
	 * @return static $this
	 */
	function tagname_is($tagname)
	{
		$this->tagname = $tagname;
		return $this;
	}

	/**
	 * @return static $this
	 */
	function tagbody_is($string)
	{
		$this->tagbody = $string;
		return $this;
	}

	/**
	 * @return static $this
	 */
	function tagbody_render(\mjolnir\types\Renderable $renderable)
	{
		$this->tagbody = $renderable;
		return $this;
	}
	
	/**
	 * If tag body is currently a non array value it will be converted to an 
	 * array maintaining the previous body (along with the new one).
	 * 
	 * @return static $this
	 */
	function appendtagbody($tagbody)
	{
		if (isset($this->tagbody) && ! \is_array($this->tagbody))
		{
			$this->tagbody = [ $this->tagbody ];
		}
		
		$this->tagbody[] = $tagbody;
		
		return $this;
	}

	/**
	 * @return mixed string or renderable
	 */
	function tagbody()
	{
		return $this->tagbody;
	}
	
	// ------------------------------------------------------------------------
	// interface: Rendered
	
	/**
	 * This class is an exception to the no __toString rule of Renderable. Using
	 * __toString in a case where another Renderable has been injected into 
	 * the current Renderable object is still considered a grave mistake and 
	 * implementations should issue an error in development; if feasible.
	 * 
	 * @return string
	 */
	function __toString()
	{
		try
		{
			return $this->render();
		}
		catch (\Exception $exception)
		{	
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
					"Error while casting form field to string: {$exception->getMessage()} $debuginfo"
				);

			if (\app\CFS::config('mjolnir/base')['development'])
			{
				// emmit catchable fatal error; note that this will need to be 
				// converted to an exception by a error handler set via 
				// \set_error_handler before it can be catchable by an external 
				// try / catch
				return null;
			}
			else # production
			{
				return ''; # gracefully emmit the error
			}
		}
	}
	
} # trait
