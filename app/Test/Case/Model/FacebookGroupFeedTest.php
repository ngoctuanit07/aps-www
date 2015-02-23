<?php
App::uses('FacebookGroupFeed', 'Model');

/**
 * FacebookGroupFeed Test Case
 *
 */
class FacebookGroupFeedTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_group_feed',
		'app.group',
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
		$this->FacebookGroupFeed = ClassRegistry::init('FacebookGroupFeed');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookGroupFeed);

		parent::tearDown();
	}

}
