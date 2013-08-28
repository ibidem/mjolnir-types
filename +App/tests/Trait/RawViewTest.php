<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_RawView;

class Trait_RawView_Tester
{
	use Trait_RawView;
}

class Trait_RawViewTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_RawView'));
	}

	// @todo tests for \mjolnir\types\Trait_RawView

} # test
