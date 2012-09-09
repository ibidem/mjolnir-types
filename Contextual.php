<?php namespace mjolnir\types;

/** 
 * Common Language Interface
 * 
 * (Used in access and security operations.)
 * 
 * @package    mjolnir
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