<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Standardized;

class Trait_Standardized_Tester
{
	use Trait_Standardized;
}

class Trait_StandardizedTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Standardized'));
	}

	// @todo tests for \mjolnir\types\Trait_Standardized

} # test
