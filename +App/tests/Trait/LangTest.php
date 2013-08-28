<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Lang;

class Trait_Lang_Tester
{
	use Trait_Lang;
}

class Trait_LangTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Lang'));
	}

	// @todo tests for \mjolnir\types\Trait_Lang

} # test
