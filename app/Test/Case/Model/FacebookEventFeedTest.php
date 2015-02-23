<?php
App::uses('FacebookEventFeed', 'Model');

/**
 * FacebookEventFeed Test Case
 *
 */
class FacebookEventFeedTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_event_feed',
		'app.event',
		'app.link',
		'app.post',
		'app.status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookEventFeed = ClassRegistry::init('FacebookEventFeed');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookEventFeed);

		parent::tearDown();
	}

}
