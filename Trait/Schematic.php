<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Schematic
{
	/**
	 * Drop database tables or other destructive operations.
	 */
	function down()
	{
		// empty
	}

	/**
	 * Create database tables or other resources.
	 */
	function up()
	{
		// empty
	}

	/**
	 * Port rows or columns to a different structure or storage medium entirely.
	 */
	function move()
	{
		// empty
	}

	/**
	 * Perform any binding operations between tables. ie. constraints
	 */
	function bind()
	{
		// empty
	}

	/**
	 * Any operation that doesn't manipulate the current architecture but mrely
	 * manipulates data in it that wouldn't fit in the move method.
	 */
	function build()
	{
		// empty
	}

} # trait
