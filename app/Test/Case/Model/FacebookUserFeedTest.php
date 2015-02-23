<?php
App::uses('FacebookUserFeed', 'Model');

/**
 * FacebookUserFeed Test Case
 *
 */
class FacebookUserFeedTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_user_feed',
		'app.user',
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
		$this->FacebookUserFeed = ClassRegistry::init('FacebookUserFeed');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookUserFeed);

		parent::tearDown();
	}

}
