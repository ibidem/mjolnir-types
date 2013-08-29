<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Channel;

class Trait_Channel_Tester
{
	use Trait_Channel;
}

class Trait_ChannelTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Channel'));
	}

	// @todo tests for \mjolnir\types\Trait_Channel

} # test
