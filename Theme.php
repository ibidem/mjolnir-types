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
	 * @return $this
	 */
	function themename_is($themename);

	/**
	 * @return $this
	 */
	function themepath_is($themepath);

	/**
	 * @return $this
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
	 * List of core themes. Core themes are themes defined in ENVFILE under the
	 * key themes. Any themes located in the cascading file system are ancilary
	 * themes since they are used for various misc pages and may appear even
	 * outside of DOCROOT.
	 *
	 * @return array
	 */
	static function corethemes();

} # interface
