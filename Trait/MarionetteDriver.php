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
	 * @return static
	 */
	static function instance(\mjolnir\types\SQLDatabase $db = null)
	{
		$i = parent::instance();
		$i->db = $db;
		return $i;
	}
	
	/**
	 * On POST, resolve input dependencies (happens before validation).
	 * 
	 * @return array updated entry
	 */
	function compile($field, array $entry, array $conf = null) 
	{
		return $entry;
	}
	
	/**
	 * On POST, field processing before POST database communication.
	 * 
	 * @return array updated fieldlist
	 */
	function compilefields($field, array $fieldlist, array $conf = null) 
	{
		return $fieldlist;
	}

	/**
	 * On GET, manipulate execution plan.
	 * 
	 * @return array updated execution plan
	 */
	function inject($field, array $plan, array $conf = null)
	{
		return $plan;
	}

} # trait
