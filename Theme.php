<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Theme extends Channeled, Meta
{
	/**
	 * Package theme assets. Compile is assumed for dependencies that require
	 * compilation.
	 *
	 * @return static
	 */
	function package();

	/**
	 * @return static
	 */
	function themename_is($themename);

	/**
	 * @return string
	 */
	function themename();

	/**
	 * @return static
	 */
	function themepath_is($themepath);

	/**
	 * @return static
	 */
	function themepath_for($theme);

	/**
	 * @return string or null
	 */
	function themepath();

	/**
	 * @return \mjolnir\types\ThemeView
	 */
	function themeview($viewtarget);

	/**
	 * List of core themes. Core themes are themes defined in the
	 * environment.file under the key themes. Any themes located in the
	 * cascading file system are ancilary themes since they are used for various
	 * misc pages and may appear even outside of sys path.
	 *
	 * @return array or null
	 */
	static function corethemes();

} # interface
