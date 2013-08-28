<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Paged;

class Trait_Paged_Tester
{
	use Trait_Paged;
}

class Trait_PagedTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Paged'));
	}

	// @todo tests for \mjolnir\types\Trait_Paged

} # test
