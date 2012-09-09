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
interface Document
{
	/**
	 * Set the document's body.
	 * 
	 * @param string document body
	 * @return \mjolnir\types\Document $this
	 */
	function body($body);
	
	/**
	 * Retrieve the body.
	 * 
	 * @return string body of document 
	 */
	function get_body();
	
} # interface