<?php namespace mjolnir\types;

/**
 * Common Language Interface
 *
 * This interface is purely for the sake of providing a common interface for
 * different implementations. This allows interoperability of code and greater
 * usability for users of said implementation--because all implementations
 * would share a common interface pattern.
 *
 * The  purely static methods mean this is useless for interclass contracts.
 *
 * Other specifics:
 *  - default language should be en-us
 *  - terms/messages with addins map to lambdas
 *  - terms/messages with out addins map to strings
 *
 * Language files should be:
 *
 *   # config/lang/source/target.php (eg. config/lang/en-us/fr-fr.php)
 *   return array
 *       (
 *           'terms' => array( ... ),
 *           'messages' => array( ... ),
 *       );
 *
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Lang # stable
{
	/**
	 * Translate a given term. The translation may not necesarily be from one
	 * language to another. For example, grammer use:
	 *
	 *     Lang::tr(':num people visited London.', ... );
	 *     // 1 => 1 person visited London.
	 *     // 2 => 2 people visited London.
	 *     // 0 => Nobody visited London.
	 *
	 * If a term is not defined, it will be returned as-is.
	 *
	 * [!!] Keys and terms are seperate entities.
	 *
	 * @param string term
	 * @param array additional parameters
	 * @param string source language
	 * @return string
	 */
	static function tr($term, array $addins = null, $lang = 'en-us');

	/**
	 * Access a specific message identified by the key.
	 *
	 * The key MUST be defined.
	 *
	 * [!!] Keys and terms are seperate entities.
	 *
	 * @param string key
	 * @param array additional parameters
	 * @return string
	 */
	static function msg($key, array $addins = null);

	/**
	 * @param string target lang
	 */
	static function language_is($language);

	/**
	 * @return string current target language
	 */
	static function language();

} # interface
