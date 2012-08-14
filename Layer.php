<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * Layers are modular components that can contain other layers.
 * 
 * @package    ibidem
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Layer
{
	const DEFAULT_LAYER_NAME = 'layer';
	
	/**
	 * @return string layer name of self 
	 */
	function get_layer_name();
	
	/**
	 * @param \ibidem\types\Layer layer
	 * @param \ibidem\types\Layer parent
	 * @return \ibidem\types\Layer $this 
	 */
	function register(\ibidem\types\Layer $layer);
	
	/**
	 * @param \ibidem\types\Layer $parent
	 * @return \ibidem\base\Layer $this
	 */
	function parent_layer(\ibidem\types\Layer $parent);

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
	 * @return \ibidem\types\Layer $this
	 * @throws \ibidem\types\Exception
	 */
	function get_layer($layer_name);
	
	/**
	 * @return array 
	 */
	function get_relay();
	
	/**
	 * Fills body and approprite calls for current layer, and pass the exception 
	 * up to be processed by the layer above, if the layer has a parent.
	 * 
	 * @param \Exception
	 * @param boolean layer is origin of exception?
	 */
	function exception(\Exception $exception, $no_throw = false, $origin = false);
	
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
	 * Register the top layer of the system
	 * 
	 * @param \ibidem\types\Layer top layer
	 */
	static function top(\ibidem\types\Layer $top_layer);
	
	/**
	 * @return \ibidem\types\Layer top layer
	 */
	static function get_top();
	
	/**
	 * Same as get on instance level. This method simply calls the top layer and
	 * invokes get.
	 * 
	 * @param string layer name
	 * @return \ibidem\types\Layer
	 * @throws \ibidem\types\Exception
	 */
	static function find($layer_name);
	
	/**
	 * Initializes execution, starting at the top. 
	 */
	static function run();
	
} # interface