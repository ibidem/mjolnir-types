<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_VersionMatcher
{
	use Trait_Matcher;
	
	/**
	 * @var string
	 */
	protected $targetversion;
	
	/**
	 * @return static
	 */
	function targetversion($targetversion)
	{
		$this->targetversion = $targetversion;
		return $this;
	}

} # trait
