<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Stash
{
	protected $stash_key_prefix = '';

	function prefix($new_key_prefix)
	{
		if ( ! empty($new_key_prefix))
		{
			$this->stash_key_prefix = $new_key_prefix;
		}
		else # empty prefix
		{
			$this->stash_key_prefix = '';
		}

		return $this;
	}

	/**
	 * Given a key, removes all special characters also applies prefix and may
	 * perform other processing.
	 *
	 * @return string processed key
	 */
	protected function generate_key($key)
	{
		// remove namespace delcaration, special characters,
		// and convert :: to double underscore
		return \preg_replace
			(
				'#[^a-zA-Z0-9_]#', '', # find & replace
				\str_replace
					(
						'::', '__', # find & replace
						\join
						(
							'',
							\array_slice
							(
								\explode('\\', $this->stash_key_prefix.$key),
								-1
							)
						)
					)
			);
	}

} # trait
