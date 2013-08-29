<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_ViewStash;

class Trait_ViewStash_Tester
{
	use Trait_ViewStash;
}

class Trait_ViewStashTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_ViewStash'));
	}

	// @todo tests for \mjolnir\types\Trait_ViewStash

} # test
