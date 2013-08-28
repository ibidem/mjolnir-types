<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_HTMLFormField_Select;

class Trait_HTMLFormField_Select_Tester
{
	use Trait_HTMLFormField_Select;
}

class Trait_HTMLFormField_SelectTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_HTMLFormField_Select'));
	}

	// @todo tests for \mjolnir\types\Trait_HTMLFormField_Select

} # test
