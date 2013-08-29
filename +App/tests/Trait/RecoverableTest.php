<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Recoverable;

class Trait_Recoverable_Tester
{
	use Trait_Recoverable;
}

class Trait_RecoverableTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Recoverable'));
	}

	// @todo tests for \mjolnir\types\Trait_Recoverable

} # test
