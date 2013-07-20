<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2013 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_Marionette
{
	/**
	 * @return \mjolnir\types\MarionetteModel for this marionette
	 */
	function collection()
	{
		static $collection_instance = null;

		if ($collection_instance === null)
		{
			$class = '\app\\'.$this->camelsingular().'Collection';
			$collection_instance = $class::instance($this->db);
		}

		return $collection_instance;
	}

	/**
	 * @return \mjolnir\types\MarionetteModel for this marionette
	 */
	function model()
	{
		static $model_instance = null;

		if ($model_instance === null)
		{
			$class = '\app\\'.$this->camelsingular().'Model';
			$model_instance = $class::instance($this->db);
		}

		return $model_instance;
	}

} # trait
