<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Exportable;

class Trait_Exportable_Tester
{
	use Trait_Exportable;
}

class Trait_ExportableTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Exportable'));
	}

	// @todo tests for \mjolnir\types\Trait_Exportable

} # test
