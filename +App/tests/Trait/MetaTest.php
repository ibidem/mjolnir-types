<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Meta;

class Trait_Meta_Tester
{
	use Trait_Meta;
}

class Trait_MetaTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Meta'));
	}

	// @todo tests for \mjolnir\types\Trait_Meta

} # test
