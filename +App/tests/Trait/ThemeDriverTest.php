<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_ThemeDriver;

class Trait_ThemeDriver_Tester
{
	use Trait_ThemeDriver;
}

class Trait_ThemeDriverTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_ThemeDriver'));
	}

	// @todo tests for \mjolnir\types\Trait_ThemeDriver

} # test
