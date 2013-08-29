<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_VideoConverter;

class Trait_VideoConverter_Tester
{
	use Trait_VideoConverter;
}

class Trait_VideoConverterTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_VideoConverter'));
	}

	// @todo tests for \mjolnir\types\Trait_VideoConverter

} # test
