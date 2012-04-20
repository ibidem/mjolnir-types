<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * (Used in access and security operations.)
 * 
 * @package    ibidem
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Contextual
{
	/**
	 * @return array context information 
	 */
	function get_context();
	
} # interface