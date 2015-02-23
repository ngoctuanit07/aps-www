<?php
App::uses('Rate', 'Model');

/**
 * Rate Test Case
 *
 */
class RateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rate',
		'app.twitter_status',
		'app.facebook_post',
		'app.user',
		'app.page',
		'app.group',
		'app.event',
		'app.application',
		'app.photo',
		'app.video',
		'app.facebook_status',
		'app.facebook_link',
		'app.facebook_comment',
		'app.achivement',
		'app.albums',
		'app.comment',
		'app.link',
		'app.milestone',
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
		$this->Rate = ClassRegistry::init('Rate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Rate);

		parent::tearDown();
	}

}
