<?php namespace mjolnir\types;

/**
 * An exportable object is an object that can be fully or partially transformed
 * into an array. If you need to pass the object down to say javascript as json
 * then you should avoid creating a jsonexport method if at all possible and
 * instead make sure the export method returns an array that can be converted
 * to json and do the conversion in a intermediate layer.
 *
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Exportable
{
	/**
	 * @return array
	 */
	function export();

} # interface
