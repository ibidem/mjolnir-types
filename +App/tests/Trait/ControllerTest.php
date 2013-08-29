<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Controller;

class Trait_Controller_Tester
{
	use Trait_Controller;
}

class Trait_ControllerTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Controller'));
	}

	// @todo tests for \mjolnir\types\Trait_Controller

} # test
