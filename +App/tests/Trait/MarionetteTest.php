<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Marionette;

class Trait_Marionette_Tester
{
	use Trait_Marionette;
}

class Trait_MarionetteTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Marionette'));
	}

	// @todo tests for \mjolnir\types\Trait_Marionette

} # test
