<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface HTMLFormField_Composite extends HTMLFormField
{
	/**
	 * @return static $this
	 */
	function addfield(\mjolnir\types\HTMLFormField $field);
	
	/**
	 * A template by which to mix the fields togheter. The template accepts
	 * %X entries where X is the index of the field (based on order they were
	 * introduced).
	 * 
	 *		$f->composite
	 *			(
	 *				'Date & Time'
	 *				[ 'datefield' => 'date', 'timefield' => 'time' ]
	 *			)
	 *			->fieldmix('%1 at %2 o'clock');
	 * 
	 * @return static $this
	 */
	function fieldmix($mix);
	
} # interface