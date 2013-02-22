<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Pager extends Meta, FileBased, Standardized, Renderable
{
	// ------------------------------------------------------------------------
	// Configuration

	/**
	 * Sets the query key. By default this is "page" for most implementations.
	 *
	 * @return static $this
	 */
	function querykey_is($querykey);

	/**
	 * Sets the paging order; "asc" or "desc"
	 *
	 * @return static $this
	 */
	function pageorder_is($order);

	/**
	 * Shorthand for setting page order.
	 *
	 * @return static $this
	 */
	function pageorder_asc();

	/**
	 * Shorthand for setting page order.
	 *
	 * @return static $this
	 */
	function pageorder_desc();

	/**
	 * @return static $this
	 */
	function page_is($page);

	/**
	 * Sets the total item count.
	 *
	 * @return static $this
	 */
	function totalitems_are($totalitems);

	/**
	 * Sets the page diff, which is the number of pages from the main pages.
	 *
	 * @return static $this
	 */
	function pagediff_is($pagediff);

	/**
	 * The number of items per page. By default 25.
	 *
	 * @return static $this
	 */
	function pagelimit_is($pagelimit);

	/**
	 * Sets the base url used for setting the pages. By default the base url
	 * is an empty string, meaning the urls generated are in the form: "?page=2"
	 *
	 * @return static $this
	 */
	function baseurl_is($baseurl);

	/**
	 * Querie that is passed down with the page.
	 *
	 * @return static $this
	 */
	function query_is(array $query);
	
	/**
	 * @return static $this
	 */
	function bookmark_is($entry, $anchor);

	// ------------------------------------------------------------------------
	// Interogation

	/**
	 * @return int total number of pages
	 */
	function pagecount();

} # interfacea