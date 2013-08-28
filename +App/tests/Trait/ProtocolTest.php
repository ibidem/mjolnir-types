<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Protocol;

class Trait_Protocol_Tester
{
	use Trait_Protocol;
}

class Trait_ProtocolTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Protocol'));
	}

	// @todo tests for \mjolnir\types\Trait_Protocol

} # test
