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
interface RelayCompatible
{
	/**
	 * @param array relay configuration
	 * @return $this
	 */
	function relay_config(array $relay);
	
} # interface