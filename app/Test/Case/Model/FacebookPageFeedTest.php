<?php
App::uses('FacebookPageFeed', 'Model');

/**
 * FacebookPageFeed Test Case
 *
 */
class FacebookPageFeedTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facebook_page_feed',
		'app.page',
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
		$this->FacebookPageFeed = ClassRegistry::init('FacebookPageFeed');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookPageFeed);

		parent::tearDown();
	}

}
