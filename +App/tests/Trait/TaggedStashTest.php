<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_TaggedStash;

class Trait_TaggedStash_Tester
{
	use Trait_TaggedStash;
}

class Trait_TaggedStashTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_TaggedStash'));
	}

	// @todo tests for \mjolnir\types\Trait_TaggedStash

} # test
