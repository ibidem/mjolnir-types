<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Filebased;

class Trait_Filebased_Tester
{
	use Trait_Filebased;
}

class Trait_FilebasedTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Filebased'));
	}

	// @todo tests for \mjolnir\types\Trait_Filebased

} # test
