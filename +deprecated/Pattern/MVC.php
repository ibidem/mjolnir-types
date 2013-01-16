<?php namespace mjolnir\types;

/** 
 * Common Language Interface
 * 
 * Model-View-Controller pattern.
 * 
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Pattern_MVC
{
	// the name to be used in layers implementing the interface; the reason you
	// wouldn't just use say "\mjolnir\types\MVC" is beause any implementation
	// could implement multiple MVC interfaces, not just the \mjolnir\types one
	const LAYER_NAME = 'mvc';
	
	/**
	 * @param \mjolnir\types\Controller 
	 * @return \mjolnir\types\Pattern_MVC $this
	 */
	function controller(\mjolnir\types\Controller $controller);
	
	/**
	 * Action paramters.
	 * 
	 * @param \mjolnir\types\Controller 
	 * @return \mjolnir\types\Pattern_MVC $this
	 */
	function params(\mjolnir\types\Params $params);
	
	/**
	 * @param array relay configuration
	 * @return \mjolnir\types\Pattern_MVC $this
	 */
	function relay_config(array $relay);
	
} # interface
