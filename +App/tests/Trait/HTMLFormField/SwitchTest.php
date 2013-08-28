<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_HTMLFormField_Switch;

class Trait_HTMLFormField_Switch_Tester
{
	use Trait_HTMLFormField_Switch;
}

class Trait_HTMLFormField_SwitchTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_HTMLFormField_Switch'));
	}

	// @todo tests for \mjolnir\types\Trait_HTMLFormField_Switch

} # test
