<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * Model-View-Controller pattern.
 * 
 * @package    ibidem
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Pattern_MVC
{
	// the name to be used in layers implementing the interface; the reason you
	// wouldn't just use say "\ibidem\types\MVC" is beause any implementation
	// could implement multiple MVC interfaces, not just the \ibidem\types one
	const LAYER_NAME = 'mvc';
	
	/**
	 * @param \ibidem\types\Controller 
	 * @return \ibidem\types\Pattern_MVC $this
	 */
	function controller(\ibidem\types\Controller $controller);
	
	/**
	 * Action paramters.
	 * 
	 * @param \ibidem\types\Controller 
	 * @return \ibidem\types\Pattern_MVC $this
	 */
	function params(\ibidem\types\Params $params);
	
	/**
	 * @param array relay configuration
	 * @return \ibidem\types\Pattern_MVC $this
	 */
	function relay_config(array $relay);
	
} # interface
