<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Writable;

class Trait_Writable_Tester
{
	use Trait_Writable;
}

class Trait_WritableTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Writable'));
	}

	// @todo tests for \mjolnir\types\Trait_Writable

} # test
