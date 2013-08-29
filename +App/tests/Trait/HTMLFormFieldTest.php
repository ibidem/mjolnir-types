<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_HTMLFormField;

class Trait_HTMLFormField_Tester
{
	use Trait_HTMLFormField;
}

class Trait_HTMLFormFieldTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_HTMLFormField'));
	}

	// @todo tests for \mjolnir\types\Trait_HTMLFormField

} # test
