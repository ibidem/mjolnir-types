<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Paged
{
	/**
	 * If page or limit are null, the limit will be set to the maximum
	 * integer value, or the command will be ignored, depending on the context
	 * of the class (ie. if the class supports infinite results).
	 *
	 * @return static $this
	 */
	function page($page, $limit = null, $offset = 0);

} # interfacea