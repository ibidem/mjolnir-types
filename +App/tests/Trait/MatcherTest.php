<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Matcher;

class Trait_Matcher_Tester
{
	use Trait_Matcher;
}

class Trait_MatcherTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Matcher'));
	}

	// @todo tests for \mjolnir\types\Trait_Matcher

} # test
