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
	 *
	 * You may pass extra configuration, such as paper and orientation, but if
	 * the configuration is read depends on the driver, so the configuration
	 * should be considered along the lines of hints.
	 */
	function stream($html, $filename, $config = []);

} # interfacea