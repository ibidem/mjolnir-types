<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_SQLStatement;

class Trait_SQLStatement_Tester
{
	use Trait_SQLStatement;
}

class Trait_SQLStatementTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_SQLStatement'));
	}

	// @todo tests for \mjolnir\types\Trait_SQLStatement

} # test
