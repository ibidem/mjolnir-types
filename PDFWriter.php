<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface PDFWriter
{
	/**
	 * @return string pdf
	 */
	function fromhtml($html);

	/**
	 * Stream pdf to client.
	 */
	function stream($html, $filename);

} # interfacea