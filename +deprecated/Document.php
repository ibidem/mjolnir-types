<?php namespace mjolnir\types;

/**
 * Common Language Interface
 *
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Document # stable
{
	/**
	 * @return static $this
	 */
	function body_is($body);

	/**
	 * @return string body of document
	 */
	function body();

} # interface