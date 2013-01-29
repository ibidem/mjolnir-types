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
	
} # trait
