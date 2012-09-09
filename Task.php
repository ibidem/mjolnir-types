<?php namespace mjolnir\types;

/** 
 * Common Language Interface
 * 
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Task
{
	/**
	 * Tasks are of the form class:name:example which should translate to
	 * \app\Task_Class_Name_Example
	 * 
	 * @param string encoded task
	 * @return \mjolnir\types\Task
	 */
	static function instance($encoded_task = null);
	
	/**
	 * @param array config
	 * @return \mjolnir\types\Task $this
	 */
	function config(array $config);
	
	/**
	 * @param array config
	 * @return \mjolnir\types\Task $this
	 */
	function writer(\mjolnir\types\Writer $writer);
	
	/**
	 * Execute task.
	 */
	function execute();
	
} # interface