<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_MarionetteDriver
{	
	/**
	 * @var \mjolnir\types\SQLDatabase
	 */
	protected $db;
	
	/**
	 * @var \mjolnir\types\Marionette
	 */
	protected $context;
	
	/**
	 * @var \mjolnir\types\Marionette
	 */
	protected $field;
	
	/**
	 * @var \mjolnir\types\Marionette
	 */
	protected $config;
	
	/**
	 * @return static
	 */
	static function instance(\mjolnir\types\SQLDatabase $db = null, \mjolnir\types\Marionette $context = null, $field = null, array $config = null)
	{
		$i = parent::instance();
		
		$i->database_is($db);
		$i->context_is($context);
		$i->field_is($field);
		$i->config_is($config);
		
		return $i;
	}
	
	/**
	 * @return static $this
	 */
	function database_is(\mjolnir\types\SQLDatabase $db)
	{
		$this->db = $db;
		return $this;
	}
	
	/**
	 * @return static $this
	 */
	function context_is(\mjolnir\types\Marionette $context)
	{
		$this->context = $context;
		return $this;
	}
	
	/**
	 * Field key, on which the driver is applied on; field is not necesarily a 
	 * database field, but for reference and input purposes a field must be 
	 * provided.
	 * 
	 * @return static $this
	 */
	function field_is($field)
	{
		$this->field = $field;
		return $this;
	}
	
	/**
	 * Driver configuration. Will normalize input.
	 * 
	 * @return static $this
	 */
	function config_is($config)
	{
		$this->config = $this->normalizeconfig($config);
		return $this;
	}
	
	/**
	 * @return normalized configuration
	 */
	function normalizeconfig(array $conf)
	{
		return $conf;
	}
	
	/**
	 * Parses the [collection] property in the driver configuration and returns
	 * a corresponding object. A new object is returned each time, unless the
	 * class in question is itself a singleton.
	 * 
	 * @return \mjolnir\types\MarionetteCollection
	 */
	protected function collection()
	{
		if ( ! isset($this->config['collection']))
		{
			throw new \app\Exception('The driver ['.\get_called_class().'] does not have any [collection] property specified for the field ['.$this->field.']');
		}
		
		// retrieve reference collection class
		if (\strpos($this->config['collection'], '\\') === false)
		{
			$class = '\app\\'.$this->config['collection'];
		}
		else # namespaced class
		{
			$class = $this->config['collection'];
		}
		
		return $class::instance($this->db);
	}
	
	/**
	 * Parses the [collection] property in the driver configuration and returns
	 * a corresponding object. A new object is returned each time, unless the
	 * class in question is itself a singleton.
	 * 
	 * @return \mjolnir\types\MarionetteCollection
	 */
	protected function model()
	{
		if ( ! isset($this->config['model']))
		{
			throw new \app\Exception('The driver ['.\get_called_class().'] does not have any [model] property specified for the field ['.$this->field.']');
		}
		
		// retrieve reference collection class
		if (\strpos($this->config['model'], '\\') === false)
		{
			$class = '\app\\'.$this->config['model'];
		}
		else # namespaced class
		{
			$class = $this->config['model'];
		}
		
		return $class::instance($this->db);
	}
	
	/**
	 * @return string class
	 */
	protected function resolveclassname($input)
	{
		if (\strpos($input, '\\') === false)
		{
			return "\app\\{$input}";
		}
		else # containts \
		{
			// assuming fully qualified class name
			return $input;
		}
	}
	
	// ------------------------------------------------------------------------
	// 
	
	# POST
	
		/**
		 * On POST, resolve input dependencies (happens before validation).
		 * 
		 * @return array updated entry
		 */
		function post_compile(array $input)
		{
			return $input;
		}

		/**
		 * On POST, resolve dependencies after the entry has been created.
		 * 
		 * @return array updated entry
		 */
		function post_latecompile(array $entry, array $input)
		{
			return $entry;
		}

		/**
		 * Field processing before POST database communication.
		 * 
		 * @return array updated fieldlist
		 */
		function post_compilefields(array $fieldlist)
		{
			return $fieldlist;
		}
		
	# PATCH
		
		/**
		 * On PATCH, resolve input dependencies (happens before validation).
		 * 
		 * @return array updated entry
		 */
		function patch_compile($id, array $input)
		{
			return $input;
		}

		/**
		 * On PATCH, resolve dependencies after the entry has been created.
		 * 
		 * @return array updated entry
		 */
		function patch_latecompile($id, array $entry, array $input)
		{
			return $entry;
		}

		/**
		 * Field processing before PATCH database communication.
		 * 
		 * @return array updated fieldlist
		 */
		function patch_compilefields(array $fieldlist)
		{
			return $fieldlist;
		}

	# GET
	
		/**
		 * On GET, manipulate execution plan.
		 * 
		 * @return array updated execution plan
		 */
		function inject(array $plan)
		{
			return $plan;
		}
		
	# DELETE
		
		/**
		 * Execute before entry is deleted.
		 */
		function predelete($id)
		{
			// empty
		}
		
		/**
		 * Execute after entry is deleted.
		 */
		function postdelete($id)
		{
			// empty
		}

} # trait
