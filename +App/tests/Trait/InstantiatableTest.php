<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Instantiatable;

class Trait_Instantiatable_Tester
{
	use Trait_Instantiatable;
}

class Trait_InstantiatableTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Instantiatable'));
	}

	// @todo tests for \mjolnir\types\Trait_Instantiatable

} # test
