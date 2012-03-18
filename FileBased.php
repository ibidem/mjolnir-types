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
interface FileBased
{
	/**
	 * @param string file 
	 * @return $this
	 */
	function file($file);
	
	/**
	 * @param string explicit file path
	 * @return $this
	 */
	function file_path($file);
	
	/**
	 * @return string file path
	 */
	function get_file();

} # interface
