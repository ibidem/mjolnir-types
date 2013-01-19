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
			if (isset($this->errormessages[$field][$claim]))
			{
				$message = $this->errormessages[$field][$claim];
			}
			else # generic rule
			{
				$generic_errors = \app\CFS::config('mjolnir/validator')['errors'];

				if (isset($generic_errors[$claim]))
				{
					$message = $generic_errors[$claim];
				}
				else # no message
				{
					throw new \app\Exception
						("No error message found for the claim [$claim] on the [$field].");
				}
			}

			// we could use array_search to limit the messages to only unique
			// ones but it may be possible for the keys to have more meaning
			// then the error itself so we leave it to be handled higher up
			$this->errors[$field][$claim] = $message;
		}

		return $this;
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
	 * @return static $this
	 */
	function check()
	{
		return empty($this->errors) ? null : $this->errors;
	}

	/**
	 * @return array
	 */
	function errors()
	{
		return $this->errors;
	}

} # trait
