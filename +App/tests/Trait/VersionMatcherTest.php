<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_VersionMatcher;

class Trait_VersionMatcher_Tester
{
	use Trait_VersionMatcher;
}

class Trait_VersionMatcherTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_VersionMatcher'));
	}

	// @todo tests for \mjolnir\types\Trait_VersionMatcher

} # test
