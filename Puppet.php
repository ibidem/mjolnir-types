<?php namespace mjolnir\types;

/**
 * A Puppet is a class which has extensive information about it's name as an
 * entity (ie. how you would call its singular form, its plural form, etc).
 *
 * Puppets are useful in modeling and classes that form extensive links between
 * one another since at a certain critical mass you will benefit greatly from
 * the classes working with code that interacts with other puppets rather then
 * you having to write every single explict class when you have 10 or more
 * classes doing roughly the same thing but interacting in a dynamic fashion
 * with classes of different names.
 *
 * So in a nutshell puppets keep your code DRY by helping your code scale from
 * a maintenance perspective.
 *
 * It is recomended that you isolate "puppet logic" in traits, whenever
 * possible. This also helps avoid accidental overuse.
 *
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Puppet
{
	/**
	 * @return string puppet singlar name
	 */
	static function singular();

	/**
	 * @return string puppet plural name
	 */
	static function plural();

	/**
	 * @return string singular with dashes instead of spaces
	 */
	static function dashsingular();

	/**
	 * @return string plural with dashes instead of spaces
	 */
	static function dashplural();

	/**
	 * @return string singular that's safe to use in code context
	 */
	static function codename();

	/**
	 * @return string plural that's safe to use in code context
	 */
	static function codegroup();

	/**
	 * @return string camel case version
	 */
	static function camelsingular();

	/**
	 * @return string camel case version
	 */
	static function camelplural();

} # interface
