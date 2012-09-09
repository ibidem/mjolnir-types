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
interface RelayCompatible
{
	/**
	 * @param array relay configuration
	 * @return \mjolnir\types\RelayCompatible $this
	 */
	function relay_config(array $relay);
	
} # interface