<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Renderable
{
	/**
	 * The render function can return a string or simply perform processing in
	 * which case it will be returning null.
	 *
	 * @return string or null
	 */
	function render();
	
	/**
	 * Registers a function that may be used in the rendering process. If such a
	 * function is used and how it is used is based on the implementation and 
	 * context of the class.
	 * 
	 * [!!] a meta renderer is not necesarily a helper for rendering the Meta
	 * interface in a class, however that is a valid/common use case
	 *
	 * @return static $this
	 */
	function addmetarenderer($key, callable $metarenderer);
	
	/**
	 * @return callable
	 */
	function metarenderer($key, $default = null);
	
	/**
	 * See: addrenderhelper above
	 * 
	 * Mass inject array of render helpers.
	 * 
	 * @return static $this
	 */
	function injectmetarenderers(array $metarenderers = null);

} # interface