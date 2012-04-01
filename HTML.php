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
interface HTML
{
	// the name to be used in layers implementing the interface; the reason you
	// wouldn't just use say "\ibidem\types\HTML" is beause any implementation
	// could implement multiple HTML interfaces, not just the \ibidem\types one
	const LAYER_NAME = 'html';
	
	// recomended doctype
	const DOCTYPE = '<!DOCTYPE html>';
	// recomended HTML5 doctype
	const HTML5_DOCTYPE = '<!DOCTYPE html>';
	// recomended HTML4 doctype
	const HTML4_DOCTYPE = ' <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">';
	
	/**
	 * Sets the doctype. See: \ibidem\types\HTML for constants.
	 * 
	 * @param string doctype
	 * @return $this
	 */
	function doctype($doctype);
	
	/**
	 * Appcache manifest location.
	 * 
	 * @param string url
	 * @return $this
	 */
	function appcache($url = null);
	
	/**
	 * Sitemap, be it index or simple sitemap.
	 * 
	 * @param string url
	 * @return $this
	 */
	function sitemap($url = null);
	
	/**
	 * @param array domains
	 * @return $this
	 */
	function add_dns_prefetch_domains(array $domains);
	
	/**
	 * @param string favicon uri
	 * @return $this
	 */
	function favicon($url = null);
	
	/**
	 * @param string title 
	 * @return $this
	 */
	function title($title);
	
	/**
	 * @param string
	 * @return $this 
	 */
	function add_stylesheet($href, $type = "text/css");
	
	/**
	 * @param string
	 * @return $this 
	 */
	function add_script($src);
	
	/**
	 * @param string description 
	 * @return $this
	 */
	function description($desc = null);
	
	/**
	 * @param array new keywards
	 * @return $this
	 */
	function add_keywords(array $keywords);
	
	/**
	 * @param string canonical url 
	 * @return $this
	 */
	function canonical($url = null);
	
	/**
	 * @param boolean enabled?
	 * @return $this
	 */
	function crawlers($enabled = true);
	
	/**
	 * @param string url
	 * @return $this
	 */
	function rssfeed($url = null);
	
	/**
	 * @param string url
	 * @return $this
	 */
	function atomfeed($url = null);
	
	/**
	 * @param string url
	 * @return $this
	 */
	function pingback($url = null);
	
	/**
	 * @param boolean enabled?
	 * @return $this 
	 */
	function humanstxt($enabled = true);
	
	/**
	 * Metadata for application running as desktop.
	 * 
	 * @param string name
	 * @return $this
	 */
	function application_name($name = null);
	
	/**
	 * Metadata for application running as desktop.
	 * 
	 * @param string tooltip
	 * @return $this
	 */
	function application_tooltip($tooltip = null);
	
	/**
	 * Metadata for application running as desktop.
	 * 
	 * @param string starturl
	 * @return $this
	 */
	function application_starturl($starturl = null);
	
} # interface
