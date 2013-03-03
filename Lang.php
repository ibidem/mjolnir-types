<?php namespace mjolnir\types;

/**
 * This interface is purely for the sake of providing a common interface for
 * different implementations. This allows interoperability of code and greater
 * usability for users of said implementation—because all implementations
 * would share a common interface pattern.
 *
 * The purely static methods mean this is useless for interclass contracts.
 *
 * Other specifics:
 *  - default language should be en-US
 *  - terms/messages with addins map to lambdas
 *  - terms/messages with out addins map to strings
 *
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Lang
{
	/**
	 * Translate a given term. The translation may not necesarily be from one
	 * language to another. For example, grammer use:
	 *
	 *     Lang::get(':num people visited London.', ... );
	 *	   // 2 => 2 people visited London.
	 *     // 1 => 1 person visited London.
	 *     // 0 => Nobody visited London.
	 *
	 * If a term is not defined, it will be returned as-is.
	 *
	 * [!!] Keys and terms are seperate entities.
	 *
	 * @return string
	 */
	static function term($term, array $addins = null, $sourcelang = 'en-US');

	/**
	 * Access a specific message identified by the key.
	 *
	 * If a key is not defined and exception will be thrown.
	 *
	 * [!!] Keys and terms are seperate entities.
	 *
	 * @return string
	 */
	static function key($key, $addins = null);

	/**
	 * Loads a directory of language configuration files. This method is here
	 * to allow for customized language configurations.
	 *
	 * There is no specified structure, the method will simply merge all
	 * configuration files in the directory that match the extention. By default
	 * the extention is the default set for PHP files, defined by EXT.
	 */
	static function load($dir, $ext = EXT);

	/**
	 * Get's a language file from the current language's directory.
	 *
	 * @return array
	 */
	static function &file($file);

	/**
	 * @param string target language
	 */
	static function targetlang_is($language);

	/**
	 * @return string current target language
	 */
	static function targetlang();

	/**
	 * Some implementations require the non-standard underscore version of lang
	 * identifiers, ie. en_US for en-US. This method converts a standard
	 * language tag to an id language tag (ie. underscore version).
	 *
	 * See: http://en.wikipedia.org/wiki/IETF_language_tag syntax information.
	 *
	 * @return string
	 */
	static function idlang($lang);

} # interface
