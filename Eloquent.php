<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
interface Eloquent
{
	/**
     * A prefix to be used in all translations. The class gurantees that all
	 * translations are done though only Lang::key and that this prefix will be
	 * used when generating all keys.
	 *
	 * This allows you to elegantly change the way a object expresses itself
	 * on a case by case basis. For example you cna have a pager be customized
	 * for a specific entry type instead of simply calling everything "entries"
	 * everywhere.
     *
	 * @return static $this
	 */
	static function langprefix($langprefix);

} # interface
