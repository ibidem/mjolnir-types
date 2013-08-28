<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_RelayNode;

class Trait_RelayNode_Tester
{
	use Trait_RelayNode;
}

class Trait_RelayNodeTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_RelayNode'));
	}

	// @todo tests for \mjolnir\types\Trait_RelayNode

} # test
