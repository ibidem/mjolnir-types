<?php namespace mjolnir\types;

/**
 * The interpretation of what the pattern can be in the `urlpattern` method is
 * up to the implementation of the interface to decide. A RegexRoute class might
 * implement it as pure regex, while a PathRoute might implement it as fixed
 * value, some classes might just require some kind of object be passed as the
 * pattern, and so on.
 *
 * [!!] It is recomended you do not use this interface when dealing with URIs.
 *
 * While an URL, ie. "a resource locator", is implicitly a "resource
 * identifier," by its function, a identifier is not necesarily a locator. If
 * you have a user and the id of that user is 2, then 2 is an identifier but
 * not exactly a very clear locator, therefore you may end up with very niche
 * classes, in which case you're better of creating a seperate interface or
 * converting the indentifer to a locator.
 *
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface URLRoute extends Meta, Contextual, Linkable, Matcher
{
	/**
	 * @return $this
	 */
	function urlpattern($pattern); # extra parameters should default to null

	/**
	 * @return static $this
	 */
	function urlbase_is($urlbase);

	/**
	 * @return string
	 */
	function urlbase();

} # interface