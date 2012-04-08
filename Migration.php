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
interface Migration
{
	/**
	 * Establish constraints.
	 */
	function bind();
	
	/**
	 * Up migration.
	 */
	function up();
	
	/**
	 * Revert migration.
	 */
	function down();
	
} # interface
