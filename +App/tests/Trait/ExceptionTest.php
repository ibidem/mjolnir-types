<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Exception;

class Trait_Exception_Tester
{
	use Trait_Exception;
}

class Trait_ExceptionTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Exception'));
	}

	// @todo tests for \mjolnir\types\Trait_Exception

} # test
