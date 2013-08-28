<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_CurrencyRates;

class Trait_CurrencyRates_Tester
{
	use Trait_CurrencyRates;
}

class Trait_CurrencyRatesTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_CurrencyRates'));
	}

	// @todo tests for \mjolnir\types\Trait_CurrencyRates

} # test
