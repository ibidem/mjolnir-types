<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Versioned;

class Trait_Versioned_Tester
{
	use Trait_Versioned;
}

class Trait_VersionedTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Versioned'));
	}

	// @todo tests for \mjolnir\types\Trait_Versioned

} # test
