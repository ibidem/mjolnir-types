<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_HTMLForm;

class Trait_HTMLForm_Tester
{
	use Trait_HTMLForm;
}

class Trait_HTMLFormTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_HTMLForm'));
	}

	// @todo tests for \mjolnir\types\Trait_HTMLForm

} # test
