<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * @package    ibidem
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2008-2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Task
{
	/**
	 * Tasks are of the form class:name:example which should translate to
	 * \app\Task_Class_Name_Example
	 * 
	 * @param string encoded task
	 * @return \ibidem\types\Task
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
	function writer(\ibidem\types\Writer $writer);
	
	/**
	 * Execute task.
	 */
	function execute();
	
} # interface