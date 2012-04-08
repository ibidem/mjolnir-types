<?php namespace ibidem\types;

/** 
 * Common Language Interface
 * 
 * @package    ibidem
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Storage
{
	/**
	 * Set the current working group. For SQL, something like the table. This 
	 * is meant to reduce complexity on mechanisms that just need very basic
	 * functionality such as 1-table queries by allowing preconfigured objects
	 * to be injected in. A null group on any of the subsequent functions is 
	 * then interpreted as the currently set group.
	 * 
	 * @param string group
	 * @return \ibidem\types\Storage $this
	 */
	function group($group);
	
	/**
	 * Empty array matches none.
	 * 
	 * @param array of key value pairs
	 * @param string group, null for currently set
	 * @return array of array of complete key values matching initial
	 */
	function fetch(array $where, $group = null);
	
	/**
	 * Remove all entries matching keys and values.
	 * 
	 * @param array key value pairs
	 * @param string group, null for currently set
	 * @return \ibidem\types\Storage $this
	 */
	function delete(array $where, $group = null);
	
	/**
	 * @param array key value pairs
	 * @param string group, null for currently set
	 * @return \ibidem\types\Storage $this
	 */
	function store(array $key_value_pairs, $group = null);
	
} # interface