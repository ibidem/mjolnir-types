<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Validator;

class Trait_Validator_Tester
{
	use Trait_Validator;
}

class Trait_ValidatorTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Validator'));
	}

	// @todo tests for \mjolnir\types\Trait_Validator

} # test
