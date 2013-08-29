<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Theme;

class Trait_Theme_Tester
{
	use Trait_Theme;
}

class Trait_ThemeTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Theme'));
	}

	// @todo tests for \mjolnir\types\Trait_Theme

} # test
