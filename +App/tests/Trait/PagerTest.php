<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Pager;

class Trait_Pager_Tester
{
	use Trait_Pager;
}

class Trait_PagerTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Pager'));
	}

	// @todo tests for \mjolnir\types\Trait_Pager

} # test
