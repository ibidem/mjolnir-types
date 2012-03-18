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