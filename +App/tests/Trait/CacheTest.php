<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Cache;

class Trait_Cache_Tester
{
	use Trait_Cache;
}

class Trait_CacheTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Cache'));
	}

	// @todo tests for \mjolnir\types\Trait_Cache

} # test
