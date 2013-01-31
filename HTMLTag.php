<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface HTMLTag extends Meta, Renderable
{
	/**
	 * @return static
	 */
	static function i($tagname, $tagbody = null);
	
	/**
	 * @return string
	 */
	function tagname();

	/**
	 * @return static $this
	 */
	function tagname_is($tagname);

	/**
	 * @return static $this
	 */
	function tagbody_is($string);

	/**
	 * @return static $this
	 */
	function tagbody_render(\mjolnir\types\Renderable $renderable);
	
	/**
	 * If tag body is currently a non array value it will be converted to an 
	 * array maintaining the previous body (along with the new one).
	 * 
	 * @return static $this
	 */
	function appendtagbody($tagbody);

	/**
	 * @return mixed string or renderable
	 */
	function tagbody();

} # interface