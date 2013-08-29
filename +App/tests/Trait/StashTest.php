<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Stash;

class Trait_Stash_Tester
{
	use Trait_Stash;
}

class Trait_StashTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Stash'));
	}

	// @todo tests for \mjolnir\types\Trait_Stash

} # test
