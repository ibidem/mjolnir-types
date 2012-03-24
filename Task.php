<?php namespace kohana4\types;

/** 
 * Common Language Interface
 * 
 * @package    Kohana4
 * @category   Types
 * @author     Kohana Team
 * @copyright  (c) 2008-2012 Kohana Team
 * @license    http://kohanaframework.org/license
 */
interface Task
{
	/**
	 * Tasks are of the form class:name:example which should translate to
	 * \app\Task_Class_Name_Example
	 * 
	 * @param string encoded task
	 * @return \kohana4\types\Task
	 */
	static function instance($encoded_task = null);
	
	/**
	 * @param array config
	 * @return $this
	 */
	function config(array $config);
	
	/**
	 * @param array config
	 * @return $this
	 */
	function writer(\kohana4\types\Writer $writer);
	
	/**
	 * Execute task.
	 */
	function execute();
	
} # interface