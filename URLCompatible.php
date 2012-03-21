<?php namespace kohana4\types;

/** 
 * Common Language Interface
 * 
 * @package    Kohana4
 * @category   Types
 * @author     Kohana Team
 * @copyright  (c) 2008-2012 Kohana Team
 * @license    http://kohanaframework.org/license
 */
interface URLCompatible
{
	/**
	 * Base for the url, if not defined should retrieve kohana4/base value.
	 * 
	 * @param string url base
	 * @return $this
	 */
	function url_base($url_base = null); // helps abstract URL out of HTTP
	
	/**
	 * By passing a null protocol the function should return a protocol-less URL
	 * so that the protocol can be determined in context. 
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
	 * @param array list of paramters
	 * @param string protocol
	 * @return string
	 */
	function url(array $params = array(), $protocol = null);
	
	/**
	 * @param array list of paramters
	 * @param string protocol
	 * @return string
	 */
	function canonical_url(array $params, $protocol); # intentionally mandatory
	
	// "Why is there no URL aliases?"
	// 
	// While it makes sense from a SEO perspective and other use cases to have
	// pretty or junky version of URLs for your users (ie. volatile components, 
	// extra junk, etc) and a canonical version that is simply the hard link to
	// said resource; it doesn't make sense to have multiple pretty versions. If
	// you have several aliases for the URL, from the perspective of what this
	// interface tries to achieve you should have server side redirects for 
	// them. Not handle them internally. Nor create them.
	//
	// tl;dr aliases are out of the scope of this interface
	
} # interface
