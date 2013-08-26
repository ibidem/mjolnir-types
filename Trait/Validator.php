<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Validator
{
	use \app\Trait_Matcher;

	/**
	 * @var array
	 */
	protected $errormessages = null;

	/**
	 * @var array
	 */
	protected $errors = null;

	/**
	 * @var array
	 */
	protected $fields = null;

	/**
	 * Common rule logic. Once the rule has been reduced to the normalized
	 * version addrule is called. Implementations should implement addrule as
	 * a protected method.
	 *
	 * @return static $this
	 */
	function rule($field, $claim, $proof = null)
	{
		if (\is_array($field))
		{
			foreach ($field as $fieldname)
			{
				$this->rule($fieldname, $claim, $proof);
			}
		}
		else if (\is_array($claim))
		{
			foreach ($claim as $claimname)
			{
				$this->rule($field, $claimname, $proof);
			}
		}
		else # field is non-array
		{
			$this->addrule($field, $claim, $proof);
		}

		return $this;
	}

	/**
	 * Equivalent shorthand for,
	 *
	 *     $validator->rule($field, 'valid', $proof);
	 *
	 * @return static $this
	 */
	function test($field, $proof = null)
	{
		return $this->rule($field, 'valid', $proof);
	}

	/**
	 * @return static $this
	 */
	function inheriterrors(\mjolnir\types\Validator $validator)
	{
		$errors = $validator->errors();
		if ($errors !== null)
		{
			foreach ($errors as $field => $rules)
			{
				foreach ($rules as $claim => $messages)
				{
					foreach ($messages as $message)
					{
						$this->adderror($field, $claim, $message);
					}
				}
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function adderrormessages(array $errormesssages = null)
	{
		if ($errormesssages !== null)
		{
			$this->errormessages !== null or $this->errormessages = [];
			foreach ($errormesssages as $field => $rules)
			{
				isset($this->errormessages[$field]) or $this->errormessages[$field] = [];
				foreach ($rules as $claim => $message)
				{
					$this->errormessages[$field][$claim] = $message;
				}
			}
		}

		return $this;
	}

	/**
	 * @return static $this
	 */
	function adderror($field, $claim, $message = null)
	{
		$this->errors !== null or $this->errors = [];

		if ($message !== null)
		{
			$this->errors[$field][$claim][] = $message;
		}
		else # no message
		{
			// we could use array_search to limit the messages to only unique
			// ones but it may be possible for the keys to have more meaning
			// then the error itself so we leave it to be handled higher up
			$this->errors[$field][$claim] = $this->geterror($field, $claim);
		}

		return $this;
	}

	/**
	 * @return string error message for field
	 */
	function geterror($field, $claim)
	{
		if (isset($this->errormessages[$field][$claim]))
		{
			return $this->errormessages[$field][$claim];
		}
		else # generic rule
		{
			$generic_errors = \app\CFS::config('mjolnir/validator')['errors'];

			if (isset($generic_errors[$claim]))
			{
				return $generic_errors[$claim];
			}
			else # no message
			{
				throw new \app\Exception
					("No error message found for the claim [$claim] on the field [$field].");
			}
		}
	}

	/**
	 * @return static $this
	 */
	function fields_array($fields)
	{
		$this->fields = $fields;
		return $this;
	}

	/**
	 * @return array
	 */
	function fields()
	{
		return $this->fields;
	}

	/**
	 * @return boolean
	 */
	function check()
	{
		return empty($this->errors) ? true : false;
	}

	/**
	 * @return array
	 */
	function errors()
	{
		return $this->errors;
	}

} # trait
