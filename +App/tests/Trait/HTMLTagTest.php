<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_HTMLTag;

class Trait_HTMLTag_Tester
{
	use Trait_HTMLTag;
}

class Trait_HTMLTagTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_HTMLTag'));
	}

	// @todo tests for \mjolnir\types\Trait_HTMLTag

} # test
