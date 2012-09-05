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
interface ErrorView
{	
	/**
	 * The error page will be returned or null if the exception can't be 
	 * handled by the view; to allow for multi-view system to handle complex
	 * exceptions.
	 * 
	 * @return string or null
	 */
	function errorpage(\Exception $e);
	
} # interface