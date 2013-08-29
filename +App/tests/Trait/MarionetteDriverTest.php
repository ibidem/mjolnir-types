<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_MarionetteDriver;

class Trait_MarionetteDriver_Tester
{
	use Trait_MarionetteDriver;
}

class Trait_MarionetteDriverTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_MarionetteDriver'));
	}

	// @todo tests for \mjolnir\types\Trait_MarionetteDriver

} # test
