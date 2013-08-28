<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_Puppet;

class Trait_Puppet_Tester
{
	use Trait_Puppet;
}

class Trait_PuppetTest extends \PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_Puppet'));
	}

	// @todo tests for \mjolnir\types\Trait_Puppet

} # test
