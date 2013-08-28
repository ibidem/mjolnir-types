<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_URLRoute;

class Trait_URLRoute_Tester
{
	use Trait_URLRoute;
}

class Trait_URLRouteTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_URLRoute'));
	}

	// @todo tests for \mjolnir\types\Trait_URLRoute

} # test
