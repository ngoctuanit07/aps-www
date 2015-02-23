<?php
App::uses('FacebookWork', 'Model');

/**
 * FacebookWork Test Case
 *
 */
class FacebookWorkTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_work',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookWork = ClassRegistry::init('FacebookWork');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookWork);

		parent::tearDown();
	}

}
