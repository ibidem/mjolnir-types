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
	 * @return $this
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
	 * @return $this
	 */
	function delete(array $where, $group = null);
	
	/**
	 * @param array key value pairs
	 * @param string group, null for currently set
	 * @return $this
	 */
	function store(array $key_value_pairs, $group = null);
	
} # interface