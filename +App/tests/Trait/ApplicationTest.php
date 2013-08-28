<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Application;

class Trait_Application_Tester
{
	use Trait_Application;
}

class Trait_ApplicationTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Application'));
	}

	// @todo tests for \mjolnir\types\Trait_Application

} # test
