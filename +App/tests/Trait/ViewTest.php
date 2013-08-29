<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_View;

class Trait_View_Tester
{
	use Trait_View;
}

class Trait_ViewTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_View'));
	}

	// @todo tests for \mjolnir\types\Trait_View

} # test
