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
interface Controller
{
	/**
	 * @param \mjolnir\types\Layer
	 * @return \mjolnir\types\Controller $this
	 */
	function layer(\mjolnir\types\Layer $layer);
	
	/**
	 * @return \mjolnir\types\Controller $this
	 */
	function before();
	
	/**
	 * @return \mjolnir\types\Controller $this
	 */
	function after();
	
	/**
	 * @param \mjolnir\types\Params
	 * @return \mjolnir\types\Controller $this
	 */
	function params(\mjolnir\types\Params $params);
	
} # interface