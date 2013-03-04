<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012, 2013, Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface HTMLFormField extends Standardized, HTMLTag
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
	 * Set the renderer used when rendering help text. Callable should accept
	 * an array of errors.
	 *
	 * @return static $this
	 */
	function errorrenderer_is(callable $renderer);

	#
	# Getters for hint renderer and error renderer intentionally ommited since
	# they do not apply in the general context of a HTMLFormField, eg. composite
	# fields would have a somewhat ambigous implementation of the fields.
	#

	// ------------------------------------------------------------------------
	// Utility

	/**
	 * Template to use when generating field. The following placeholders can
	 * be used when creating the template
	 *
	 *  :id     - field ID
	 *	:label  - the label of the field
	 *  :field  - the field
	 *  :hints  - insertion point for help renderer
	 *  :errors - insertion point for error renderer
	 *
	 * @return static $this
	 */
	function fieldtemplate_is($template);

	/**
	 * @return string
	 */
	function fieldtemplate();

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

	/**
	 * @return static $this
	 */
	function adderror($message);

	/**
	 * @return static $this
	 */
	function adderrors(array $errors = null);

	/**
	 * @return array
	 */
	function errors();

	/**
	 * The string version of the field only (no templates, hints, errors, etc).
	 *
	 * @return string
	 */
	function fieldrender();

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
	# eg. misc query forms

	/**
	 * Show errors for this field.
	 *
	 * @return static $this
	 */
	function showerrors();
	# eg. fields in a composite default to noerrors

	/**
	 * @return static $this
	 */
	function disable_autocomplete();

	/**
	 * @return static $this
	 */
	function enable_autocomplete();

} # interface