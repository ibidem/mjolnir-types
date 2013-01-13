<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Application extends Renderable, Channeled
{
	/**
     * Arguments should be of type \mjolnir\types\Layer
     *
	 * @return static
	 */
	static function stack($args);

	/**
	 * Handle error in the layers.
	 */
	function criticalerror(\Exception $exception);

	/**
	 * Exceptions will initiate recovery mode. If errors occur in the Layers
	 * themselves criticalerror will be invoked.
	 *
	 * @return static $this
	 */
	function recover_exceptions();

	/**
	 * Throws any exceptions that happens. Use this when instantiating an
	 * Application inside another running Application.
	 *
	 * @return static $this
	 */
	function throw_exceptions();

} # interface