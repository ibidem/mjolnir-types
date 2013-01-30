<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012, 2013, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface HTMLFormField extends HTMLTag, Standardized
{	
	/**
	 * Set value using default value representation. May call act as a proxy for
	 * other methods.
	 * 
	 * @return static $this
	 */
	function value_is($fieldvalue);
	
	/**
	 * @return static $this
	 */
	function fieldlabel_is($fieldlabel);
	
	/**
	 * @return static $this
	 */
	function fieldlabel();
	
	// ------------------------------------------------------------------------
	// Renderers
	
	/**
	 * Set the renderer used when rendering help text. Callable should accept
	 * an array of hints.
	 * 
	 * @return static $this
	 */
	function hintrenderer_is(callable $renderer);
	
	/**
	 * @return callable
	 */
	function hintrenderer();
	
	/**
	 * Set the renderer used when rendering help text. Callable should accept
	 * an array of errors.
	 * 
	 * @return static $this
	 */
	function errorrenderer_is(callable $renderer);
	
	/**
	 * @return callable
	 */
	function errorrenderer();
	
	// ------------------------------------------------------------------------
	// Utility
	
	/**
	 * Template to use when generating field. The following placeholders can
	 * be used when creating the template
	 * 
	 *	:label  - the label of the field
	 *  :field  - the field
	 *  :hints  - insertion point for help renderer
	 *  :errors - insertion point for error renderer
	 * 
	 * @return static $this
	 */
	function template_is($template);
	
	/**
	 * @return string
	 */
	function template();
	
	/**
	 * Adds a help message to be used by the help renderer.
	 * 
	 * @return static $this
	 */
	function hint($helpmessage);
	
	/**
	 * @return array
	 */
	function hints();
	
	// ------------------------------------------------------------------------
	// etc
	
	/**
	 * @return static $this
	 */
	function form_is(\mjolnir\types\HTMLForm $form);
	
	/**
	 * @return static $this
	 */
	function form();
	
	/**
	 * Hide errors for this field.
	 * 
	 * @return static $this
	 */
	function noerrors();
	
	/**
	 * Show errors for this field.
	 * 
	 * @return static $this
	 */
	function showerrors();
	
} # interface