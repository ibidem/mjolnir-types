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
interface Document
{
	/**
	 * Set the document's body.
	 * 
	 * @param string document body
	 * @return $this
	 */
	function body($body);
	
	/**
	 * Retrieve the body.
	 * 
	 * @return string body of document 
	 */
	function get_body();
	
} # interface