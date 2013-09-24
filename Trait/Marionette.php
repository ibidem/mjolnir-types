<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Marionette
{
	/**
	 * @var \mjolnir\types\SQLDatabase
	 */
	protected $db;

	/**
	 * @return static
	 */
	static function instance(\mjolnir\types\SQLDatabase $db = null)
	{
		if ($db == null)
		{
			$db = \app\SQLDatabase::instance();
		}

		$in = parent::instance();
		$in->db = $db;

		return $in;
	}

	// ------------------------------------------------------------------------
	// Context

	/**
	 * @return string
	 */
	static function singular()
	{
		return static::config()['name'];
	}

	/**
	 * @return string
	 */
	static function plural()
	{
		$config = static::config();
		return isset($config['plural']) ? $config['plural'] : $config['name'].'s';
	}

	/**
	 * @return string
	 */
	static function keyfield()
	{
		return static::config()['key'];
	}

	// ------------------------------------------------------------------------
	// Utility

	/**
	 * @return string
	 */
	static function table()
	{
		$dbconfig = \app\CFS::config('mjolnir/database');

		if (isset(static::$table))
		{
			return $dbconfig['table_prefix'].static::$table;
		}
		else # static::$table attribute not provided
		{
			$config = static::config();
			if (isset($config['table']))
			{
				return $dbconfig['table_prefix'].$config['table'];
			}
			else # no configuration table set
			{
				return $dbconfig['table_prefix'].static::codegroup();
			}
		}
	}

	/**
	 * @return array
	 */
	static function config()
	{
		static $config = null;

		if ($config === null)
		{
			if (isset(static::$configfile))
			{
				$config = \app\CFS::config(static::$configfile);
			}
			else # dynamically resolve configuration
			{
				$configfile = \str_replace('_', '-', \strtolower(\preg_replace('/.*\\\/', '', \get_called_class())));
				$configfile = \preg_replace('#(model|collection)$#', '', $configfile);
				$config = \app\CFS::config($configfile);
			}

			if (empty($config))
			{
				throw new \app\Exception('Missing configuration file for '.\get_called_class().'. File: '.(isset(static::$configfile) ? static::$configfile : $configfile));
			}

			static::normalizeconfig($config);
		}

		return $config;
	}

	/**
	 * @return array
	 */
	protected static function normalizeconfig(array & $config)
	{
		isset($config['key']) or $config['key'] = 'id';
		isset($config['fields']) or $config['fields'] = [];

		foreach ($config['fields'] as $field => & $fieldconf)
		{
			if (\is_string($fieldconf))
			{
				$fieldconf = [ 'type' => $fieldconf, 'visibility' => 'public' ];
			}
			else # array
			{
				if ( ! isset($fieldconf['visibility']))
				{
					$fieldconf['visibility'] = 'public';
				}
			}
		}
	}

	// ------------------------------------------------------------------------
	// Security

	/**
	 * @var array global operation filters
	 */
	protected $filters = [];

	/**
	 * Sets a set of conditions that are REQUIRED by all operations; this is to
	 * say that any get, put, patch, delete must be done with the given set of
	 * conditions, eg. assuming you've added the usergroup functionality in
	 * your application you would use [ 'usergroup' => \app\Auth::usergroup() ]
	 * so that usergroups have isolated entries.
	 *
	 * The conditions will overwrite any conditions placed on requests and will
	 * be interpreted using `SQL::parseconstraints`.
	 *
	 * `null` may be passed to remove the conditions. Re-calling the method will
	 * merge over existing filters.
	 *
	 * @return static $this
	 */
	function filter($conditions) # intentionally not using `array`
	{
		if ($conditions === null)
		{
			$this->filters = [];
		}
		else # assumed array
		{
			$normalized = [];
			foreach ($conditions as $key => $condition)
			{
				$normalized['entry.'.$key] = $condition;
			}

			$this->filters = \app\Arr::merge($this->filters, $normalized);
		}

		return $this;
	}

	// ------------------------------------------------------------------------
	// Helpers

	/**
	 * @return \mjolnir\types\MarionetteModel for this marionette
	 */
	function collection()
	{
		static $collection_instance = null;

		if ($collection_instance === null)
		{
			$class = '\app\\'.$this->camelsingular().'Collection';
			$collection_instance = $class::instance($this->db);
		}

		return $collection_instance;
	}

	/**
	 * @return \mjolnir\types\MarionetteModel for this marionette
	 */
	function model()
	{
		static $model_instance = null;

		if ($model_instance === null)
		{
			$class = '\app\\'.$this->camelsingular().'Model';
			$model_instance = $class::instance($this->db);
		}

		return $model_instance;
	}

} # trait
