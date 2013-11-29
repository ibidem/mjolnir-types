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

	/**
	 * Shorthand for retrieving value from a querie that performs a COUNT, SUM
	 * or some other calculation.
	 *
	 * @return mixed
	 */
	function fetch_calc($on_null = null)
	{
		$calc_entry = $this->fetch_entry();
		$value = \array_pop($calc_entry);

		if ($value !== null)
		{
			return $value;
		}
		else # null value
		{
			return $on_null;
		}
	}

	// ------------------------------------------------------------------------
	// Multi-assignment

	/**
	 * @return static $this
	 */
	function strs(array $params, array $filter = null, $varkey = ':')
	{
		if ($filter === null)
		{
			foreach ($params as $key => $value)
			{
				$this->str($varkey.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->str($varkey.$key, $params[$key]);
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function nums(array $params, array $filter = null, $varkey = ':')
	{
		if ($filter === null)
		{
			foreach ($params as $key => $value)
			{
				$this->num($varkey.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->num($varkey.$key, $params[$key]);
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function bools(array $params, array $filter = null, array $map = null, $varkey = ':')
	{
		if ($filter === null)
		{
			foreach ($params as $key => $value)
			{
				$this->bool($varkey.$key, $value, $map);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->bool($varkey.$key, $params[$key], $map);
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function dates(array $params, array $filter = null, $varkey = ':')
	{
		if ($filter === null)
		{
			foreach ($params as $key => $value)
			{
				$this->date($varkey.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->date($varkey.$key, $params[$key]);
			}
		}

		return $this;
	}

	// ------------------------------------------------------------------------
	// Multi binding

	/**
	 * @return static $this
	 */
	function bindstrs(array &$params, array $filter = null, $varkey = ':')
	{
		if ($filter === null)
		{
			foreach ($params as $key => &$value)
			{
				$this->bindstr($varkey.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->bindstr($varkey.$key, $params[$key]);
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function bindnums(array &$params, array $filter = null, $varkey = ':')
	{
		if ($filter === null)
		{
			foreach ($params as $key => &$value)
			{
				$this->bindnum($varkey.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->bindnum($varkey.$key, $params[$key]);
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function bindbools(array &$params, array $filter = null, $varkey = ':')
	{
		if ($filter === null)
		{
			foreach ($params as $key => &$value)
			{
				$this->bindbool($varkey.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->bindbool($varkey.$key, $params[$key]);
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function binddates(array &$params, array $filter = null, $varkey = ':')
	{
		if ($filter === null)
		{
			foreach ($params as $key => &$value)
			{
				$this->binddate($varkey.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->binddate($varkey.$key, $params[$key]);
			}
		}

		return $this;
	}

	// ------------------------------------------------------------------------
	// Stored procedure arguments

	/**
	 * @return static $this
	 */
	function args(array &$params, array $filter = null, $varkey = ':')
	{
		if ($filter === null)
		{
			foreach ($params as $key => &$value)
			{
				$this->bindarg($varkey.$key, $value);
			}
		}
		else # filtered
		{
			foreach ($filter as $key)
			{
				$this->bindarg($varkey.$key, $params[$key]);
			}
		}

		return $this;
	}

	// ------------------------------------------------------------------------
	// etc

	/**
	 * @var array|null
	 */
	protected $pleceholders = null;

	/**
	 * Before being submitted all placeholders will be replaced in the
	 * statement. The external vars assignment allows for statements to be
	 * written in a very consistent easy to read way.
	 *
	 * This method always ADDs more placeholders. It doesn't have an "add" in
	 * the name for bravety.
	 *
	 * [!!] vars WILL/SHOULD never do any sanitation of the input and SHOULD
	 * NEVER be used for actual input
	 *
	 * Rule of Thumb: If it's a internal system variable (eg. table name,
	 * special column name) use vars and place it in brackets to denote it's
	 * both not sanitized and also that it's NOT user input.
	 *
	 * eg.
	 *
	 *      SELECT entry.*
	 *        FROM `[products]` entry
	 *       WHERE entry.[lft] < :target_lft
	 *         AND entry.[rgt] > :target_rgt
	 *
	 *  Example vars,
	 *
	 *  [
	 *      '[products]' => \app\ProductsLib::table(),
	 *      '[lft]' => static::tree_lft(),
	 *      '[rgt]' => static::tree_rgt(),
	 *  ]
	 *
	 * @return static $this
	 */
	function vars(array $placeholders)
	{
		\app\Arr::merge($this->vars, $placeholders);
		return $this;
	}

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

		// augment map
		$map['1'] = true;
		$map[1] = true;
		$map['0'] = false;
		$map[0] = false;

		if (isset($map[$value]))
		{
			return $map[$value];
		}
		else if (\is_bool($value))
		{
			return $value;
		}
		else # undefined boolean
		{
			throw new \app\Exception('Unrecognized boolean value passed.');
		}
	}

} # trait
