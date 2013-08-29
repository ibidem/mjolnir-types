<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Renderable;

class Trait_Renderable_Tester
{
	use Trait_Renderable;
}

class Trait_RenderableTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Renderable'));
	}

	// @todo tests for \mjolnir\types\Trait_Renderable

} # test
