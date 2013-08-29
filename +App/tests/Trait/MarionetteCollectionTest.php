<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_MarionetteCollection;

class Trait_MarionetteCollection_Tester
{
	use Trait_MarionetteCollection;
}

class Trait_MarionetteCollectionTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_MarionetteCollection'));
	}

	// @todo tests for \mjolnir\types\Trait_MarionetteCollection

} # test
