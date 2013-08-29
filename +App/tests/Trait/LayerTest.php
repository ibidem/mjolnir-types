<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Layer;

class Trait_Layer_Tester
{
	use Trait_Layer;
}

class Trait_LayerTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Layer'));
	}

	// @todo tests for \mjolnir\types\Trait_Layer

} # test
