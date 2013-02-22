<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Task
{
	use \app\Trait_Executable;
	use \app\Trait_Meta;
	use \app\Trait_Writable;
	
	/**
	 * @return \mjolnir\types\Task
	 */
	static function instance()
	{
		$instance = parent::instance();
		$instance->writer_is(\app\SilentWriter::instance());
		
		return $instance;
	}

} # trait
