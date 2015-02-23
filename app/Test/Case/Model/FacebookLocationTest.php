<?php
App::uses('FacebookLocation', 'Model');

/**
 * FacebookLocation Test Case
 *
 */
class FacebookLocationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_location',
		'app.page'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookLocation = ClassRegistry::init('FacebookLocation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookLocation);

		parent::tearDown();
	}

}
