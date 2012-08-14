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
interface GlobalEvent
{
	/**
	 * Notifies all registered event handlers of $event.
	 * 
	 * @param string event
	 * @param mixed parameter data
	 */
	static function fire($event, $params);
	
	/**
	 * Registers the handler to the event. When an event is fired, the handler
	 * will be called. The handler will recieved any additional paramters passed
	 * to the event.
	 * 
	 * @param string event
	 * @param callback
	 */
	static function listener($event, $handler);
	
} # interface