<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_ThemeView;

class Trait_ThemeView_Tester
{
	use Trait_ThemeView;
}

class Trait_ThemeViewTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_ThemeView'));
	}

	// @todo tests for \mjolnir\types\Trait_ThemeView

} # test
