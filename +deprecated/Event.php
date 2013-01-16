<?php namespace mjolnir\types;

/** 
 * Common Language Interface
 * 
 * @package    mjolnir
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
	const expires = '\mjolnir\types\Event::expires'; # => int/date
	
	// etags of some resource
	const etags = '\mjolnir\types\Event::etags'; # => string/etag
	
	// request for caching switching
	const caching = '\mjolnir\types\Event::caching'; # => boolean
	
	// request for buffering switching
	const buffering = '\mjolnir\types\Event::output/buffering'; # => boolean
	
	// redirecting (http, etc)
	const redirect = '\mjolnir\types\Event::redirect'; # => url/string
	
	// content-type headers
	const content_type = 'content-type'; # => string
	
	// style file
	const css_style = '\mjolnir\types\Event::css_style'; # => string
	
	// style file
	const js_script = '\mjolnir\types\Event::js_script'; # => string
	
	// extra markup
	const head_tag = '\mjolnir\types\Event::head_tag'; # => string
	
} # interface