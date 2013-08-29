<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Resetable;

class Trait_Resetable_Tester
{
	use Trait_Resetable;
}

class Trait_ResetableTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Resetable'));
	}

	// @todo tests for \mjolnir\types\Trait_Resetable

} # test
