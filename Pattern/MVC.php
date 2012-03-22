<?php namespace kohana4\types;

/** 
 * Common Language Interface
 * 
 * Model-View-Controller pattern.
 * 
 * @package    Kohana4
 * @category   Types
 * @author     Kohana Team
 * @copyright  (c) 2008-2012 Kohana Team
 * @license    http://kohanaframework.org/license
 */
interface Pattern_MVC
{
	// the name to be used in layers implementing the interface; the reason you
	// wouldn't just use say "\kohana4\types\MVC" is beause any implementation
	// could implement multiple MVC interfaces, not just the \kohana4\types one
	const LAYER_NAME = 'mvc';
	
	/**
	 * @param \kohana4\types\Controller 
	 * @return $this
	 */
	function controller(\kohana4\types\Controller $controller);
	
	/**
	 * Action paramters.
	 * 
	 * @param \kohana4\types\Controller 
	 * @return $this
	 */
	function params(\kohana4\types\Params $params);
	
	/**
	 * @param array relay configuration
	 * @return $this
	 */
	function relay_config(array $relay);
	
} # interface
