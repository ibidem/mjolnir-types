<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_SQLStatement
{
	use \app\Trait_Executable;
	use \app\Trait_Paged;

	// ------------------------------------------------------------------------
	// Multi-assignment

	/**
	 * @return static $this
	 */
	function strs(array $params, array $filter = null)
	{
		if ($filter === null)
		{
			foreach ($params as $key => $value)
			{
				$this->str(':'.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->str(':'.$key, $params[$key]);
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function nums(array $params, array $filter = null)
	{
		if ($filter === null)
		{
			foreach ($params as $key => $value)
			{
				$this->num(':'.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->num(':'.$key, $params[$key]);
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function bools(array $params, array $filter = null, array $map = null)
	{
		if ($filter === null)
		{
			foreach ($params as $key => $value)
			{
				$this->bool(':'.$key, $value, $map);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->bool(':'.$key, $params[$key], $map);
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function dates(array $params, array $filter = null, array $map = null)
	{
		if ($filter === null)
		{
			foreach ($params as $key => $value)
			{
				$this->date(':'.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->date(':'.$key, $params[$key]);
			}
		}

		return $this;
	}

	// ------------------------------------------------------------------------
	// Multi binding

	/**
	 * @return static $this
	 */
	function bindstrs(array & $params, array $filter = null)
	{
		if ($filter === null)
		{
			foreach ($params as $key => & $value)
			{
				$this->bindstr(':'.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->bindstr(':'.$key, $params[$key]);
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function bindnums(array & $params, array $filter = null)
	{
		if ($filter === null)
		{
			foreach ($params as $key => & $value)
			{
				$this->bindnum(':'.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->bindnum(':'.$key, $params[$key]);
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function bindbools(array & $params, array $filter = null)
	{
		if ($filter === null)
		{
			foreach ($params as $key => & $value)
			{
				$this->bindbool(':'.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->bindbool(':'.$key, $params[$key]);
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function binddates(array & $params, array $filter = null, array $map = null)
	{
		if ($filter === null)
		{
			foreach ($params as $key => & $value)
			{
				$this->binddate(':'.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->binddate(':'.$key, $params[$key]);
			}
		}

		return $this;
	}

	// ------------------------------------------------------------------------
	// Stored procedure arguments

	/**
	 * @return static $this
	 */
	function args(array & $params, array $filter = null)
	{
		if ($filter === null)
		{
			foreach ($params as $key => & $value)
			{
				$this->bindarg(':'.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->bindarg(':'.$key, $params[$key]);
			}
		}

		return $this;
	}

	// ------------------------------------------------------------------------
	// etc

	/**
	 * Automatically calculates and sets :offset and :limit based on a page
	 * input. If page or limit are null, the limit will be set to the maximum
	 * integer value.
	 *
	 * @return static $this
	 */
	function page($page, $limit = null, $offset = 0)
	{
		if ($page === null || $limit === null)
		{
			// retrieve all rows
			$this->num(':offset', $offset);
			$this->num(':limit', PHP_INT_MAX);
		}
		else # $page != null
		{
			$this->num(':offset', $limit * ($page - 1) + $offset);
			$this->num(':limit', $limit);
		}

		return $this;
	}

	/**
	 * @return boolean
	 */
	protected function booleanize($value, array $map = null)
	{
		$map !== null or $map = \app\CFS::config('mjolnir/boolean-map');

		if (isset($map[$value]))
		{
			return $map[$value];
		}
		else # undefined boolean
		{
			throw new \app\Exception('Unrecognized boolean value passed.');
		}
	}

} # trait
