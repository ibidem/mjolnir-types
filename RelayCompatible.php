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
interface RelayCompatible
{
	/**
	 * @param array relay configuration
	 * @return \ibidem\types\RelayCompatible $this
	 */
	function relay_config(array $relay);
	
} # interface