<?php namespace kohana4\types;

/** 
 * Common Language Interface
 * 
 * Layers are modular components that can contain other layers.
 * 
 * @package    Kohana4
 * @category   Types
 * @author     Kohana Team
 * @copyright  (c) 2008-2012 Kohana Team
 * @license    http://kohanaframework.org/license
 */
interface Layer
{
	const DEFAULT_LAYER_NAME = 'layer';
	
	/**
	 * @return string layer name of self 
	 */
	function get_layer_name();
	
	/**
	 * @param \kohana4\types\Layer layer
	 * @param \kohana4\types\Layer parent
	 * @return \kohana4\types\Layer 
	 */
	function register(\kohana4\types\Layer $layer);
	
	/**
	 * @param \kohana4\types\Layer $parent
	 * @return \kohana4\base\Layer
	 */
	function parent_layer(\kohana4\types\Layer $parent);

	/**
	 * Execute the layer.
	 */
	function execute();
	
	/**
	 * Get the Layer with the specified name. The current layer will try to find 
	 * the layer in it's registered layers, and if it fails it will ask for it
	 * from each component.
	 * 
	 * @param string layer name
	 * @return \kohana4\types\Layer
	 * @throws \kohana4\types\Exception
	 */
	function get_layer($layer_name);
	
	/**
	 * Fills body and approprite calls for current layer, and pass the exception 
	 * up to be processed by the layer above, if the layer has a parent.
	 * 
	 * @param \Exception
	 * @param boolean layer is origin of exception?
	 */
	function exception(\Exception $exception, $origin = false);
	
	/**
	 * Layer contents; if any. Or null, for no contents.
	 * 
	 * [!!] This method doesn't necesarly return string
	 * 
	 * @return mixed
	 */
	function get_contents();
	
	/**
	 * Executes non-content related tasks before main contents.
	 */
	function headerinfo();
	
	/**
	 * Captures a broadcast Event.
	 * 
	 * @param \kohana4\types\Event
	 */
	function capture(\kohana4\types\Event $event);
	
	/**
	 * Sends an Event to the parent of the current layer.
	 * 
	 * @param \kohana4\types\Event
	 */
	function dispatch(\kohana4\types\Event $event);
	
	/**
	 * Register the top layer of the system
	 * 
	 * @param \kohana4\types\Layer top layer
	 */
	static function top(\kohana4\types\Layer $top_layer);
	
	/**
	 * @return \kohana4\types\Layer top layer
	 */
	static function get_top();
	
	/**
	 * Same as get on instance level. This method simply calls the top layer and
	 * invokes get.
	 * 
	 * @param string layer name
	 * @return \kohana4\types\Layer
	 * @throws \kohana4\types\Exception
	 */
	static function find($layer_name);
	
	/**
	 * Initializes execution, starting at the top. 
	 */
	static function run();
	
	/**
	 * Send an Event to the top layer and then down
	 * 
	 * @param \kohana4\types\Event
	 */
	static function broadcast(\kohana4\types\Event $event);
	
} # interface