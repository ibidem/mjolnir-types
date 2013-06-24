<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface ThemeDriver extends Channeled, Renderable, Resetable, Recoverable
{
	/**
	 * @return static
	 */
	function package(\mjolnir\types\Theme $theme, $parentversion);

} # interface
