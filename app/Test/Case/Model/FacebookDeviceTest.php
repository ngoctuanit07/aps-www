<?php
App::uses('FacebookDevice', 'Model');

/**
 * FacebookDevice Test Case
 *
 */
class FacebookDeviceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_device',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookDevice = ClassRegistry::init('FacebookDevice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookDevice);

		parent::tearDown();
	}

}
