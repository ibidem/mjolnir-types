<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Task;

class Trait_Task_Tester
{
	use Trait_Task;
}

class Trait_TaskTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Task'));
	}

	// @todo tests for \mjolnir\types\Trait_Task

} # test
