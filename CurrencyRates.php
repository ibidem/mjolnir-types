<?php namespace mjolnir\types;

/**
 * This is a driver interface. See: \app\Currency
 *
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface CurrencyRates
{
	/**
	 * Insert rate information into given types array and pass it back.
	 *
	 * @return array
	 */
	function process($types);

} # interface
