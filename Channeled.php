<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Channeled
{
	/**
	 * @return static $this
	 */
	function channel_is(\mjolnir\types\Channel $pipeline);

	/**
	 * @return \mjolnir\types\Channel
	 */
	function channel();

} # interface
