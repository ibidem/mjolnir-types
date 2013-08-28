<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_HTMLFormField_Composite;

class Trait_HTMLFormField_Composite_Tester
{
	use Trait_HTMLFormField_Composite;
}

class Trait_HTMLFormField_CompositeTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_HTMLFormField_Composite'));
	}

	// @todo tests for \mjolnir\types\Trait_HTMLFormField_Composite

} # test
