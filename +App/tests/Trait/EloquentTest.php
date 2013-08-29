<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Eloquent;

class Trait_Eloquent_Tester
{
	use Trait_Eloquent;
}

class Trait_EloquentTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Eloquent'));
	}

	// @todo tests for \mjolnir\types\Trait_Eloquent

} # test
