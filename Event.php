<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * @package    ibidem
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2008-2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Event
{
	# --- Enum: Generic Event Terms ------------------------------------------ #
	
	/* namespace prefix is intentionally ommited for general terms */
	
	// the canonical url of the resource
	const canonical_url = 'rel=canonical'; # => string/url	
	
	// a very important "title"
	const title = 'title'; # => string
	
	// a very important "description"
	const description = 'description'; # => string
	
	// important "tags"
	const tags = 'tags'; # => array(strings)
	
	// one of the authors
	const author = 'rel=author'; # => string
	
	// expire data for "some" content
	const expires = '\ibidem\types\Event::expires'; # => int/date
	
	// etags of some resource
	const etags = '\ibidem\types\Event::etags'; # => string/etag
	
	// request for caching switching
	const caching = '\ibidem\types\Event::caching'; # => boolean
	
	// request for buffering switching
	const buffering = '\ibidem\types\Event::output/buffering'; # => boolean
	
	// redirecting (http, etc)
	const redirect = '\ibidem\types\Event::redirect'; # => url/string
	
	# ------------------------------------------------------------------------ #
	
	/**
	 * Event signature. Typically you should just pass __CLASS__
	 * 
	 * @param string
	 * @return $this
	 */
	function signature($signature);
	
	/**
	 * @return string Event's signature
	 */
	function get_signature();
	
	/**
	 * @param mixed contents
	 * @return $this
	 */
	function contents($contents);
	
	/**
	 * @param mixed event contents
	 */
	function get_contents();
	
	/**
	 * Event message, 
	 * 
	 * eg.
	 * 
	 *     GET:\ibidem\types\Writer
	 *     rel=canonical
	 *     rel=description
	 *     rel=tags
	 *     rel=author
	 *     title
	 * 
	 * or 
	 * 
	 *     output/buffering
	 *     caching
	 *     expires
	 *     http/etags
	 * 
	 * etc.
	 * 
	 * For exceptions, errors or anything else that should be "throwable" use 
	 * the exception handling on Layers.
	 * 
	 * It is recomended you don't extend/define a new Event class for every one 
	 * of those unless you actually have something to add to it's functionality
	 * or interface. Classes in OOP weren't created as globals; just use common 
	 * terms that you might attach to the subject of the event.
	 * 
	 * Knowing the subject to respond to, or knowing the class to capture is 
	 * equal in knowledge, but the class also needs loading, and can potentially
	 * drag an entire chain of other classes behind it, while the simple title 
	 * is just a plain old string.
	 * 
	 * If you wish to have control over the event language, and the language is
	 * diverse enough, simply create a interface with constants and use that 
	 * as a Enum. Do not store constants in your class (ie. implementation) to 
	 * avoid dependency problems; an interface is dependency free. 
	 * 
	 * eg.
	 * 
	 * namespace yournamespace;
	 * 
	 * interface Enum_SEO
	 * { 
	 *     const 'canonical' = '\yournamespace\Enum_SEO::canonical'; # => string
	 *     const 'author' = '\yournamespace\Enum_SEO::author'; # => string
	 * }
	 * 
	 * Using common terms like 'title', 'expires' or 'GET:\someinterface' may be
	 * more flexible however; when applicable.
	 * 
	 * @param string subject of the Event
	 * @return $this
	 */
	function subject($subject);
	
	/**
	 * @return string event subject
	 */
	function get_subject();
	
} # interface