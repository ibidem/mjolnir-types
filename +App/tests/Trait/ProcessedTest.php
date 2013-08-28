<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Processed;

class Trait_Processed_Tester
{
	use Trait_Processed;
}

class Trait_ProcessedTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Processed'));
	}

	// @todo tests for \mjolnir\types\Trait_Processed

} # test
