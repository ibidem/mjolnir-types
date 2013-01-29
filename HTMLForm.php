<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface HTMLForm extends HTMLTag
{
	
	
	// ------------------------------------------------------------------------
	// Errors & Values
	
	/**
	 * The given values will be used to autofill the form. They may be however
	 * ignored depending on context.
	 * 
	 * @return static $this
	 */
	function autocomplete(array & $hints = null);
	
	/**
	 * Binds errors for the from.
	 * 
	 * eg.
	 * 
	 *		HTMLForm::instance()->errors_are($errors['Something.add']);
	 * 
	 * In a simpler context (or partials) you may just have $errors, but 
	 * typically you'll have more then one form so you'll need to bind to a 
	 * unique key.
	 * 
	 * @return static $this
	 */
	function errors_are(array & $errors = null);
	
	/**
	 * Retrieves errors for a given field.
	 * 
	 * @return array or null
	 */
	function errors($field = null);
	
	// ------------------------------------------------------------------------
	// Utility

	/**
	 * Returns the form signature or creates signature using given id and form
	 * signature.
	 * 
	 * @return string
	 */
	function signature($id = null);
	
	/**
	 * @return string
	 */
	function sign();
	
	/**
	 * @return string
	 */
	function mark();

	// ------------------------------------------------------------------------
	// Autoconfiguration

	/**
	 * @return static $this
	 */
	function is_basicuploader();
	
} # interface