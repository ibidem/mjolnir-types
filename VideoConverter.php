<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface VideoConverter
{
	/**
	 * Given a source file converts it to an output file.
	 */
	function convert($source_file, $output_file, array $config = null);

} # interfacea