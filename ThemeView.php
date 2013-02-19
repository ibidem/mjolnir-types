<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012, 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface ThemeView extends Channeled, View
{
	/**
	 * @return static $this
	 */
	function themepath_is($themepath);

	/**
	 * @return string
	 */
	function themepath();
	
	/**
	 * @return \mjolnir\types\View
	 */
	function partial($path);
	
	/**
	 * @return string theme resource url
	 */
	function resource($path);
	
} # interface
