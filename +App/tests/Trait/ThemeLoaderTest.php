<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_ThemeLoader;

class Trait_ThemeLoader_Tester
{
	use Trait_ThemeLoader;
}

class Trait_ThemeLoaderTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_ThemeLoader'));
	}

	// @todo tests for \mjolnir\types\Trait_ThemeLoader

} # test
