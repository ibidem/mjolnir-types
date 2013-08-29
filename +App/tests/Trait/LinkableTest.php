<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Linkable;

class Trait_Linkable_Tester
{
	use Trait_Linkable;
}

class Trait_LinkableTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Linkable'));
	}

	// @todo tests for \mjolnir\types\Trait_Linkable

} # test
