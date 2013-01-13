<?php namespace mjolnir\types;

/**
 * This interface exists to allow for loose contracts in methods. Basically if
 * you have a method accept only \Exception you are saying that you can't have
 * a class that acts as an exception if it's part of some bigger hirarchy chain.
 *
 * To allow for more flexible exceptions and to follow into the trait
 * conventions, this interface is here to mitigate.
 *
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Exception
{
	/**
	 * @return string
	 */
	function getMessage();

} # interface