<?php namespace mjolnir\types\tests;

use \mjolnir\types\Trait_HTMLFormField_AjaxUploader;

class Trait_HTMLFormField_AjaxUploader_Tester
{
	use Trait_HTMLFormField_AjaxUploader;
}

class Trait_HTMLFormField_AjaxUploaderTest extends \app\PHPUnit_Framework_TestCase
{
	/** @test */ function
	can_be_loaded()
	{
		$this->assertTrue(\trait_exists('\mjolnir\types\Trait_HTMLFormField_AjaxUploader'));
	}

	// @todo tests for \mjolnir\types\Trait_HTMLFormField_AjaxUploader

} # test
