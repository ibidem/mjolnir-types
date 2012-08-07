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
interface FileBased # stable
{
	/**
	 * @param string file 
	 * @return \ibidem\types\FileBased $this
	 */
	function file($file);
	
	/**
	 * @param string explicit file path
	 * @return \ibidem\types\FileBased $this
	 */
	function file_path($file);
	
	/**
	 * @return string file path
	 */
	function get_file();

} # interface
