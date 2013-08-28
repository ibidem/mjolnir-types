<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Schematic;

class Trait_Schematic_Tester
{
	use Trait_Schematic;
}

class Trait_SchematicTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Schematic'));
	}

	// @todo tests for \mjolnir\types\Trait_Schematic

} # test
