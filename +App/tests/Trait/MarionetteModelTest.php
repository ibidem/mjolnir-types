<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_MarionetteModel;

class Trait_MarionetteModel_Tester
{
	use Trait_MarionetteModel;
}

class Trait_MarionetteModelTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_MarionetteModel'));
	}

	// @todo tests for \mjolnir\types\Trait_MarionetteModel

} # test
