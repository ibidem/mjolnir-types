<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_SQLDatabase;

class Trait_SQLDatabase_Tester
{
	use Trait_SQLDatabase;
}

class Trait_SQLDatabaseTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_SQLDatabase'));
	}

	// @todo tests for \mjolnir\types\Trait_SQLDatabase

} # test
