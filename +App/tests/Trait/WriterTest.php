<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Writer;

class Trait_Writer_Tester
{
	use Trait_Writer;
}

class Trait_WriterTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Writer'));
	}

	// @todo tests for \mjolnir\types\Trait_Writer

} # test
