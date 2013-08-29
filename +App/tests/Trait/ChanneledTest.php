<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Channeled;

class Trait_Channeled_Tester
{
	use Trait_Channeled;
}

class Trait_ChanneledTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Channeled'));
	}

	// @todo tests for \mjolnir\types\Trait_Channeled

} # test
