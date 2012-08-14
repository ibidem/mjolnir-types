<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * @package    ibidem
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
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
	
	// content-type headers
	const content_type = 'content-type'; # => string
	
	// style file
	const css_style = '\ibidem\types\Event::css_style'; # => string
	
	// style file
	const js_script = '\ibidem\types\Event::js_script'; # => string
	
	// extra markup
	const head_tag = '\ibidem\types\Event::head_tag'; # => string
	
} # interface