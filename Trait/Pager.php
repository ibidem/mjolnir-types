<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Pager
{
	use \app\Trait_Meta;
	use \app\Trait_Filebased;
	use \app\Trait_Standardized;
	use \app\Trait_Renderable;

	// ------------------------------------------------------------------------
	// Configuration

	/**
	 * Sets the query key. By default this is "page" for most implementations.
	 *
	 * @return static $this
	 */
	function querykey_is($querykey)
	{
		$this->set('querykey', $querykey);
		return $this;
	}

	/**
	 * Sets the paging order; "asc" or "desc"
	 *
	 * @return static $this
	 */
	function pageorder_is($order)
	{
		$this->set('pageorder', $order);
		return $this;
	}

	/**
	 * Shorthand for setting page order.
	 *
	 * @return static $this
	 */
	function pageorder_asc()
	{
		$this->set('pageorder', 'asc');
		return $this;
	}

	/**
	 * Shorthand for setting page order.
	 *
	 * @return static $this
	 */
	function pageorder_desc()
	{
		$this->set('pageorder', 'desc');
		return $this;
	}

	/**
	 * @return static $this
	 */
	function page_is($page)
	{
		$this->set('page', $page);
		return $this;
	}

	/**
	 * Sets the total item count.
	 *
	 * @return static $this
	 */
	function totalitems_are($totalitems)
	{
		$this->set('totalitems', $totalitems);
		return $this;
	}

	/**
	 * Sets the page diff, which is the number of pages from the main pages.
	 *
	 * @return static $this
	 */
	function pagediff_is($pagediff)
	{
		$this->set('pagediff', $pagediff);
		return $this;
	}

	/**
	 * The number of items per page. By default 25.
	 *
	 * @return static $this
	 */
	function pagelimit_is($pagelimit)
	{
		$this->set('pagelimit', $pagelimit);
		return $this;
	}

	/**
	 * Sets the base url used for setting the pages. By default the base url
	 * is an empty string, meaning the urls generated are in the form: "?page=2"
	 *
	 * @return static $this
	 */
	function baseurl_is($baseurl)
	{
		$this->set('baseurl', $baseurl);
		return $this;
	}

	/**
	 * Query that is passed down with the page.
	 *
	 * @return static $this
	 */
	function query_is(array $query)
	{
		if (isset($query['page']))
		{
			unset($query['page']);
		}

		if ( ! empty($query))
		{
			$this->set('query', $this->get('query').\http_build_query($query, '', '&amp;').'&amp;');
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function bookmark_is($entry, $anchor)
	{
		$this->set('bookmark_entry', $entry);
		$this->set('bookmark_anchor', $anchor);
		
		return $this;
	}
	
	// ------------------------------------------------------------------------
	// interface: Standardized

	/**
	 * @return static $this
	 */
	function apply($standard)
	{
		$standard = \app\CFS::config('mjolnir/pager')['pager.standards'][$standard];
		$standard($this);

		return $this;
	}

	// ------------------------------------------------------------------------
	// interface: Filebased

	/**
	 * @return static $this
	 */
	function file_is($file, $ext = null)
	{
		$this->file_path(\app\CFS::file("views/$file", $ext === null ? '.php' : $ext));
		return $this;
	}

	// ------------------------------------------------------------------------
	// interface: Renderable

	/**
	 * @return string
	 */
	function render()
	{
		// setup pager
		$this->calculate_pager_attributes();

		// start capture
		\ob_start();
		try
		{
			$file = $this->filepath();
			
			if (empty($file))
			{
				throw new \app\Exception('No pager view set; or provided view path is corrupt.');
			}
			
			unset($file);
			
			// extract view paramters into current scope as references to 
			// paramter array in the view itself, skipping over already defined 
			// variables
			\extract($this->metadata, EXTR_REFS);
			
			// include in current scope
			include $this->filepath();
		}
		catch (\Exception $error)
		{
			// cleanup
			\ob_end_clean();
			// re-throw
			throw $error;
		}
		// success
		return \ob_get_clean();
	}

	/**
	 * This class is an exception to the no __toString rule of Renderable. Using
	 * __toString in a case where another Renderable has been injected into
	 * the current Renderable object is still considered a grave mistake and
	 * implementations should issue an error in development; if feasible.
	 *
	 * @return string
	 */
	function __toString()
	{
		try
		{
			return $this->render();
		}
		catch (\Exception $exception)
		{
			// diagnose
			$trace = \debug_backtrace();
			$caller = \array_shift($trace);
			$debuginfo = "Called by {$caller['function']}";

			if (isset($caller['class']))
			{
				$debuginfo .= " in {$caller['class']}";
			}

			\mjolnir\log
				(
					'Error',
					"Error while casting pager to string: {$exception->getMessage()} $debuginfo"
				);

			if (\app\CFS::config('mjolnir/base')['development'])
			{
				// emmit catchable fatal error; note that this will need to be
				// converted to an exception by a error handler set via
				// \set_error_handler before it can be catchable by an external
				// try / catch
				return null;
			}
			else # production
			{
				return ''; # gracefully emmit the error
			}
		}
	}

	// ------------------------------------------------------------------------
	// Helpers

	/**
	 * Configure internals.
	 */
	protected function configure_internals()
	{
		// misc

		$this->set('langprefix', 'mjolnir:pager/');
		$this->set('currentpage', null);
		$this->set('order', 'asc');
		$this->set('query', '?');
		$this->set('querykey', 'page');
		$this->set('next', 'Next');
		$this->set('prev', 'Previous');

		// optional features

		$this->set('bookmark_anchor', null);
		$this->set('bookmark_page', 0);
		$this->set('bookmark_entry', 0);

		$this->set('ruler', null);

		$this->set('jumpto', true);
		$this->set('pageindex', true);

		// internal

		$this->set('pagecount', 0);
		$this->set('startpoint', 0);
		$this->set('endpoint', 0);
		$this->set('startellipsis', 0);
		$this->set('endellipsis', 0);
	}

} # trait
