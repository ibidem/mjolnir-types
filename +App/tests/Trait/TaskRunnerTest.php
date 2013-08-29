<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_TaskRunner;

class Trait_TaskRunner_Tester
{
	use Trait_TaskRunner;
}

class Trait_TaskRunnerTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_TaskRunner'));
	}

	// @todo tests for \mjolnir\types\Trait_TaskRunner

} # test
