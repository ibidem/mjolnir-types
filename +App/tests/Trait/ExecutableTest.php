<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Executable;

class Trait_Executable_Tester
{
	use Trait_Executable;
}

class Trait_ExecutableTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Executable'));
	}

	// @todo tests for \mjolnir\types\Trait_Executable

} # test
