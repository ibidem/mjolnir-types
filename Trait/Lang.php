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
	protected static $targetlang = 'en-US';

	/**
	 * Current index
	 *
	 * @var array
	 */
	protected $index = array
		(
			// empty library
		);

	protected $loaded_libraries = array
		(
			// no libraries
		);

	/**
	 * Defines a library used for indexing (ie. idx function) when translating.
	 * Terms already loaded in the index will be overwritten.
	 *
	 * @return static $this
	 */
	function addlibrary($librarykey)
	{
		$libraries = \app\CFS::config('lang/'.static::$targetlang.'/libraries');

		if ( ! isset($libraries[$librarykey]))
		{
			throw new \Exception("No such library: $librarykey");
		}

		$syspath = \app\Env::key('sys.path');

		// we can have null libraries, ie. the key is defined but the library
		// is empty/nonexistent
		if ($libraries[$librarykey] !== null)
		{
			if (\file_exists($libraries[$librarykey].EXT))
			{
				$this->index = \app\Arr::merge($this->index, include $libraries[$librarykey].EXT);
			}
			else if (\file_exists($syspath.$libraries[$librarykey].EXT))
			{
				$this->index = \app\Arr::merge($this->index, include $syspath.$libraries[$librarykey].EXT);
			}
			else if (\file_exists($libraries[$librarykey]) && \is_dir($libraries[$librarykey]))
			{
				$this->index = \app\Arr::merge($this->index, static::load($libraries[$librarykey]));
			}
			else if (\file_exists($syspath.$libraries[$librarykey]) && \is_dir($syspath.$libraries[$librarykey]))
			{
				$this->index = \app\Arr::merge($this->index, static::load($syspath.$libraries[$librarykey]));
			}
			else # could not find file
			{
				throw new \app\Exception('Failed to resolve library path: '.$libraries[$librarykey]);
			}
		}

		$this->loaded_libraries[] = $librarykey;

		return $this;
	}

	/**
	 * @return string
	 */
	function idx($index_key, $addins = null)
	{
		if ( ! isset($this->index[$index_key]))
		{
			throw new \app\Exception('Missing key ['.$index_key.'] for language ['.static::$targetlang.'] in index. Loaded libraries: '.\implode(', ', $this->loaded_libraries));
		}

		if ($addins !== null)
		{
			// if we have addins, the term matches to a lambda
			return $this->index[$index_key]($addins);
		}
		else # no addins
		{
			// if there are no addins, the key maps to a string
			return $this->index[$index_key];
		}
	}

	/**
	 * Translate a given term. The translation may not necesarily be from one
	 * language to another. For example, grammar use:
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
	static function term($term, $addins = null, $sourcelang = 'en-US')
	{
		// lang/en-US/keys => translate to en-US using messages
		// lang/en-US/ro-RO => translate to en-US from ro-RO

		$langterms = \app\CFS::config('lang/'.static::$targetlang.'/'.$sourcelang);

		if ( ! isset($langterms[$term]))
		{
			if ($addins)
			{
				\mjolnir\masterlog
					(
						"Lang/$sourcelang/".static::$targetlang,
						"The term [$term] is missing a translation (from $sourcelang to ".static::$targetlang.")."
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
						"Lang/$sourcelang/".static::$targetlang,
						"The term [$term] is missing a translation (from $sourcelang to ".static::$targetlang.")."
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
	static function key($key, $addins = null)
	{
		$keys = \app\CFS::config('lang/'.static::$targetlang.'/keys');

		if ( ! isset($keys[$key]))
		{
			throw new \app\Exception('Missing message ['.$key.'] for language ['.static::$targetlang.'].');
		}

		if ($addins !== null)
		{
			// if we have addins, the term matches to a lambda
			return $keys[$key]($addins);
		}
		else # no addins
		{
			// if there are no addins, the key maps to a string
			return $keys[$key];
		}
	}

	/**
	 * Loads a directory of language configuration files. This method is here
	 * to allow for customized language configurations.
	 *
	 * There is no specified structure, the method will simply merge all
	 * configuration files in the directory that match the extention. By default
	 * the extention is the default set for PHP files, defined by EXT.
	 *
	 * The method may be customzied to interpolate different configuration file
	 * types togheter or load various other formats into PHP.
	 */
	static function load($dir, $ext = EXT)
	{
		if ( ! \file_exists($dir))
		{
			return [];
		}

		$files = \app\Filesystem::files($dir, $ext);

		$langconfig = [];
		foreach ($files as $file)
		{
			$langconfig = \app\Arr::merge($langconfig, include $file);
		}

		return $langconfig;
	}

	/**
	 * Same as load only the path will be prefixed by the current environment's
	 * sys.path. This method is a convenient shorthand when using libraries at
	 * the application level (where they should be used).
	 */
	static function load_syspath($dir, $ext = EXT)
	{
		$syspath = \app\Env::key('sys.path');
		return static::load($syspath.$dir, $ext);
	}

	/**
	 * Get's a language file from the current language's directory.
	 *
	 * @return array
	 */
	static function file($file)
	{
		return \app\CFS::config('lang/'.static::$targetlang.'/'.$file);
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

	/**
	 * Some implementations require the non-standard underscore version of lang
	 * identifiers, ie. en_US for en-US. This method converts a standard
	 * language tag to an id language tag (ie. underscore version).
	 *
	 * See: http://en.wikipedia.org/wiki/IETF_language_tag syntax information.
	 *
	 * @return string
	 */
	static function idlang($lang)
	{
		return \str_replace('-', '_', $lang);
	}

} # trait
