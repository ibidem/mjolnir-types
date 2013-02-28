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
interface Pager # stable
{
	const ascending  = 'asc';
	const descending = 'dsc';
	
	/**
	 * @param integer page
	 * @return static $this 
	 */
	function currentpage($page);
	
	/**
	 * @param integer page
	 * @return static $this 
	 */
	function bookmark($page);
	
	/**
	 * Generic anchor; for example, in the case of html this will result in
	 * a '#'.$anchor in the url; other systems might behave differently.
	 * 
	 * @param string anchor
	 * @return static $this
	 */
	function bookmark_anchor($anchor);
	
	/**
	 * @param array lang
	 * @return static $this 
	 */
	function lang(array $lang);
	
	/**
	 * @param string order
	 * @return static $this
	 */
	function order($order);
	
	/**
	 * @param integer total items
	 * @return static $this
	 */
	function totalitems($totalitems);
	
	/**
	 * @param string base_url
	 * @return static $this
	 */
	function url_base($url_base);

	/**
	 * @param integer pagediff
	 * @return static $this 
	 */
	function pagediff($pagediff);
	
	/**
	 * @param integer pagelimit
	 * @return static $this
	 */
	function pagelimit($pagelimit);
	
} # interface