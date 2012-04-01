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
interface Controller
{
	/**
	 * @param \ibidem\types\Layer
	 * @return $this
	 */
	function layer(\ibidem\types\Layer $layer);
	
	/**
	 * @return $this 
	 */
	function before_action();
	
	/**
	 * @return $this 
	 */
	function after_action();
	
	/**
	 * @param \ibidem\types\Params
	 * @return $this
	 */
	function params(\ibidem\types\Params $params);
	
} # interface