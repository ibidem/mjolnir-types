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

} # interface