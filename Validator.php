<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Validator extends Matcher
{
	/**
	 * A field will be tested against a claim and validated by the proof, or if
	 * the proof is null the claim will provide the proof itself.
	 *
	 * Field and claim may be an array, and proof may be a function. The array
	 * version will always be translated down to the non-array version.
	 *
	 * eg.
	 *
	 *	   // check a password is not empty
	 *     $validator->rule('password', 'not_empty');
	 *
	 *     // check both a password and title are not empty
	 *	   $validator->rule(['title', 'password'], 'not_empty');
	 *
	 *     // check a title is unique; two equivalent methods
	 *     $validator->rule('title', 'valid', ! static::exists($field['title'], 'title', $context));
	 *     $validator->test('title', ! static::exists($field['title'], 'title', $context));
	 *
	 *     // check multiple fields
	 *     $validator->rule
	 *         (
	 *             ['given_name', 'family_name'],
	 *             function ($fields, $field)) use ($context)
	 *             {
	 *                 return ! static::exists($field[$field], $field, $context);
	 *             }
	 *         );
	 *
	 *
	 * @return static $this
	 */
	function rule($field, $claim, $proof = null);

	/**
	 * Equivalent shorthand for,
	 *
	 *     $validator->rule($field, 'valid', $proof);
	 *
	 * @return static $this
	 */
	function test($field, $proof = null);

	/**
	 * @return static $this
	 */
	function fields_array($fields);

	/**
	 * @return array
	 */
	function fields();

	/**
	 * @return static $this
	 */
	function inheriterrors(\mjolnir\types\Validator $validator);

	/**
	 * @return static $this
	 */
	function adderrormessages(array $errormesssages = null);

	/**
	 * @return array or null no errors
	 */
	function errors();

} # interfacea