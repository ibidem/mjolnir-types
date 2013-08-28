<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Savable;

class Trait_Savable_Tester
{
	use Trait_Savable;
}

class Trait_SavableTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Savable'));
	}

	// @todo tests for \mjolnir\types\Trait_Savable

} # test
