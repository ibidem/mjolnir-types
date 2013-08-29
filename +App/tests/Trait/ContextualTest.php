<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Contextual;

class Trait_Contextual_Tester
{
	use Trait_Contextual;
}

class Trait_ContextualTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Contextual'));
	}

	// @todo tests for \mjolnir\types\Trait_Contextual

} # test
