<?php
App::uses('FacebookEvent', 'Model');

/**
 * FacebookEvent Test Case
 *
 */
class FacebookEventTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_event',
		'app.user',
		'app.page',
		'app.group',
		'app.facebook_user',
		'app.facebook_users_facebook_event'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookEvent = ClassRegistry::init('FacebookEvent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookEvent);

		parent::tearDown();
	}

}
