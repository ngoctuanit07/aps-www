<?php
App::uses('FacebookUsersFacebookEvent', 'Model');

/**
 * FacebookUsersFacebookEvent Test Case
 *
 */
class FacebookUsersFacebookEventTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_users_facebook_event',
		'app.user',
		'app.event'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookUsersFacebookEvent = ClassRegistry::init('FacebookUsersFacebookEvent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookUsersFacebookEvent);

		parent::tearDown();
	}

}
