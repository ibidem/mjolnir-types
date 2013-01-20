<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Schematic
{
	/**
	 * Undo a database structure.
	 */
	function down();

	/**
	 * Create a database structure.
	 */
	function up();

	/**
	 * Alter a database structure.
	 */
	function move();

	/**
	 * Bind constraints on a database structure.
	 */
	function bind();

	/**
	 * Populate a database structure.
	 */
	function build();

} # interface
