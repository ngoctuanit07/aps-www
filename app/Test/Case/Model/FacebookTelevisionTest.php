<?php
App::uses('FacebookTelevision', 'Model');

/**
 * FacebookTelevision Test Case
 *
 */
class FacebookTelevisionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_television',
		'app.user',
		'app.page'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookTelevision = ClassRegistry::init('FacebookTelevision');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookTelevision);

		parent::tearDown();
	}

}
