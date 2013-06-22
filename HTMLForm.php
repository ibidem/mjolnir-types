<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface HTMLForm extends Standardized, HTMLTag
{
	// ------------------------------------------------------------------------
	// Primary Field Management

	/**
	 * [!!] pseudofieldtype intentionally doesn't default to null
	 *
	 * [!!] pseudofieldtype is NOT fieldtype, if it is the identifier for what
	 * it is suppose to be
	 *
	 * @return \mjolnir\types\HTMLFormField
	 */
	function field($label, $fieldname, $pseudofieldtype);

	/**
	 * @return \mjolnir\types\HTMLFormField_Textarea
	 */
	function textarea($label, $fieldname = null);

	/**
	 * Any additonal parameters are interpreted as HTMLFormFields that are part
	 * of the composite.
	 *
	 * If an array is passed as second parameter the fields will be interpreted
	 * as text HTMLFormFields.
	 *
	 * Therefore the following:
	 *
	 *		$form->composite('Name', ['given_name', 'family_name']);
	 *
	 * Is equivalent to this:
	 *
	 *		$form->composite
	 *			(
	 *				'Name',
	 *				$form->text(null, 'given_name'),
	 *				$form->text(null, 'family_name')
	 *			);
	 *
	 * You may also specify a type by making entries associative:
	 *
	 *		[ 'address' => 'text', 'postalcode' => 'number' ]
	 *
	 * @return \mjolnir\types\HTMLFormField_Composite
	 */
	function composite($label);

	/**
	 * @return \mjolnir\types\HTMLFormField_Select
	 */
	function select($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField_AjaxUploader
	 */
	function imageuploader($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField_AjaxUploader
	 */
	function videouploader($label, $fieldname = null);

	// ------------------------------------------------------------------------
	// Specialized Fields & Shorthands

	/**
	 * @return \mjolnir\types\HTMLFormField_Hidden
	 */
	function hidden($fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function submit($label, $fieldname = null, $tagvalue = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function button($label, $fieldname = null, $tagbody = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function reset($label, $fieldname = null, $tagvalue = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function text($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function password($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField_Radio
	 */
	function radio($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField_Checkbox
	 */
	function checkbox($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function file($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function search($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function number($label, $fieldname = null);

	/**
	 * ie. 1234-123-33 and similar non-numeric IDs
	 *
	 * @return \mjolnir\types\HTMLFormField
	 */
	function identifier($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function currency($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function phonenumber($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function url($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function email($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function month($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function week($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function color($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function range($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function image($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function date($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function time($label, $fieldname = null);

	/**
	 * @return \mjolnir\types\HTMLFormField
	 */
	function datetime($label, $fieldname = null);

	/**
	 * Same as datetime only there is no timezone.
	 *
	 * @return \mjolnir\types\HTMLFormField
	 */
	function localdatetime($label, $fieldname = null);

	// ------------------------------------------------------------------------
	// Errors & Values

	/**
	 * The given values will be used to autofill the form. They may be however
	 * ignored depending on context.
	 *
	 * @return static $this
	 */
	function autocomplete(array &$hints = null);

	/**
	 * Retrieve autocomplete value for given field or null.
	 *
	 * @return mixed or null
	 */
	function autovalue($fieldname);

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
	function errors_are(array &$errors = null);

	/**
	 * Retrieves errors for a given field.
	 *
	 * @return array or null
	 */
	function errors($fieldname);

	// ------------------------------------------------------------------------
	// Formatting

	/**
	 * If fieldtype is null the template will replace the general
	 * purpose template that applies to all fields in the absence of a
	 * specialized template, otherwise a specialized template will be added.
	 *
	 * @return static $this
	 */
	function addfieldtemplate($template, $fieldtype = null);

	/**
	 * When fieldtype is null the general purpose template will be retrieved.
	 *
	 * @return string
	 */
	function fieldtemplate($fieldtype = null);

	/**
	 * If fieldtype is null the template will replace the general
	 * purpose template that applies to all fields in the absence of a
	 * specialized template, otherwise a specialized template will be added.
	 *
	 * @return static $this
	 */
	function addhintrenderer(callable $hintrenderer, $fieldtype = null);

	/**
	 * When fieldtype is null the general purpose hint renderer will
	 * be retrieved.
	 *
	 * @return callable
	 */
	function hintrenderer($fieldtype = null);

	/**
	 * If fieldtype is null the template will replace the general
	 * purpose template that applies to all fields in the absence of a
	 * specialized template, otherwise a specialized template will be added.
	 *
	 * Format: function (array $errors = null);
	 *
	 * @return static $this
	 */
	function adderrorrenderer(callable $errorrenderer, $fieldtype = null);

	/**
	 * When fieldtype is null the general purpose error renderer will
	 * be retrieved.
	 *
	 * @return callable
	 */
	function errorrenderer($fieldtype = null);

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
	function basicuploader();

	/**
	 * @return static $this
	 */
	function nonuploader();

	// ------------------------------------------------------------------------
	// etc

	/**
	 * Form will not add any additional fields (eg. form field).
	 */
	function disable_metainfo();


	/**
	 * Reverse of disable_metadata
	 */
	function enable_metainfo();

	/**
	 * Instructs the form to act as a generator only. This is used when the the
	 * system generates forms but the forms are merely javascript templates and
	 * not actual html forms you would submit normally. Larely due to how
	 * convenient the system is when it comes to generating code based on a
	 * given standard ruleset.
	 *
	 * @return static
	 */
	function unsigned();

	/**
	 * @return boolean
	 */
	function is_unsigned();

} # interface