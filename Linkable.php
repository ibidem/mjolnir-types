<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Linkable
{
	/**
	 * By passing a null protocol the function should return (by default) a
	 * protocol-less URL so that the protocol can be determined in context.
	 *
	 * See: "5. Relative URI References" of http://www.ietf.org/rfc/rfc2396.txt
	 *
	 * "Why relative?" For one URL's might are not always for http, so avoiding
	 * the assumtion is a plus in and of itself. But basically one problem it
	 * solves is the need to programitically coerce every single link or URL
	 * passed into a document to the correct version. So for example consider
	 * http and https. Passing from http to https and vice versa is not
	 * something you should be doing too often as it may have adverse effects on
	 * the user's clients (notices, etc). This is why you'll see sites just go
	 * full out https, since the overhead these days is relatively non-existent.
	 *
	 * By saying...
	 *
	 *     //example.com/something
	 *
	 * ...it will magically translate to https://example.com/something or
	 * http://example.com/something on the client side. Note that it's not
	 * necesarly as straight forward as "the document's protocol". Please read
	 * the rfc2396 (full link above) for more information.
	 *
	 * This behavior should respect some configuration value. One issue that
	 * arises is that a lot of processors that convert urls to links don't
	 * understand the protocol declaration, so for backwards compatiblity it
	 * may be required in some applications to revert to http as default.
	 *
	 * If false is passed to the protocol an url with out the protocol will be
	 * generated.
	 *
	 * @return string
	 */
	function url(array $params = null, array $query = null, $protocol = null);

} # interface
