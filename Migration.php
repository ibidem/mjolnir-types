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
