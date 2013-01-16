<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Lang
{
	/**
	 * @var string
	 */
	protected static $targetlang = 'en-us';

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
	static function term($term, array $addins = null, $sourcelang = 'en-us')
	{
		// lang/en-us/messages => translate to en-us using messages
		// lang/en-us/ro-ro => translate to en-us from ro-ro

		$langterms = \app\CFS::config('lang/'.static::$targetlang.'/'.$sourcelang);

		if ( ! isset($langterms[$term]))
		{
			if ($addins)
			{
				\mjolnir\masterlog
					(
						'Failure',
						"The term [$term] is missing a translation (from $sourcelang to ".static::$targetlang.").",
						"Lang/$sourcelang/".static::$targetlang.'/'
					);

				return \strtr($term, $addins);
			}
			else if ($sourcelang === static::$targetlang)
			{
				return $term;
			}
			else # term not set
			{
				\mjolnir\masterlog
					(
						'Failure',
						"The term [$term] is missing a translation (from $sourcelang to ".static::$targetlang.").",
						'Lang/'.$sourcelang.'/'.static::$targetlang.'/'
					);

				return $term;
			}
		}
		else if ($addins !== null)
		{
			// if we have addins, the term matches to a lambda
			return $langterms[$term]($addins);
		}
		else # no addins
		{
			// if there are no addins, the key maps to a string
			return $langterms[$term];
		}
	}

	/**
	 * Access a specific message identified by the key.
	 *
	 * If a key is not defined and exception will be thrown.
	 *
	 * [!!] Keys and terms are seperate entities.
	 *
	 * @return string
	 */
	static function key($key, array $addins = null, $sourcelang = 'en-us')
	{
		$messages = \app\CFS::config('lang/'.static::$targetlang.'/messages');

		if ( ! isset($messages[$key]))
		{
			throw new \app\Exception('Missing message ['.$key.'] for language ['.static::$targetlang.'].');
		}

		if ($addins !== null)
		{
			// if we have addins, the term matches to a lambda
			return $messages[$key]($addins);
		}
		else # no addins
		{
			// if there are no addins, the key maps to a string
			return $messages[$key];
		}
	}

	/**
	 * Loads a directory of language configuration files. This method is here
	 * to allow for customized language configurations.
	 *
	 * There is no specified structure, the method will simply merge all
	 * configuration files in the directory that match the extention. By default
	 * the extention is the default set for PHP files, defined by EXT.
	 */
	static function load($dir, $ext = EXT)
	{
		throw new \app\Exception_NotImplemented();
	}

	/**
	 * @param string target language
	 */
	static function targetlang_is($language)
	{
		static::$targetlang = $language;
	}

	/**
	 * @return string current target language
	 */
	static function targetlang()
	{
		return static::$targetlang;
	}

} # trait
