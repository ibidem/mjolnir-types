<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_ViewFrame;

class Trait_ViewFrame_Tester
{
	use Trait_ViewFrame;
}

class Trait_ViewFrameTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_ViewFrame'));
	}

	// @todo tests for \mjolnir\types\Trait_ViewFrame

} # test
