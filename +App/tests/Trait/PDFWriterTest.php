<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_PDFWriter;

class Trait_PDFWriter_Tester
{
	use Trait_PDFWriter;
}

class Trait_PDFWriterTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_PDFWriter'));
	}

	// @todo tests for \mjolnir\types\Trait_PDFWriter

} # test
