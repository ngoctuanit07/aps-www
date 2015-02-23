<?php
App::uses('Status', 'Model');

/**
 * Status Test Case
 *
 */
class StatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status',
		'app.user',
		'app.facebook_comment',
		'app.achivement',
		'app.albums',
		'app.comment',
		'app.link',
		'app.milestone',
		'app.photo',
		'app.post',
		'app.video',
		'app.rate',
		'app.twitter_status',
		'app.facebook_post',
		'app.page',
		'app.group',
		'app.event',
		'app.application',
		'app.facebook_status',
		'app.facebook_link',
		'app.facebook_event_feed',
		'app.facebook_group_feed',
		'app.facebook_like',
		'app.album',
		'app.facebook_messages_tag',
		'app.tagging_post',
		'app.facebook_page_feed',
		'app.facebook_sharedpost',
		'app.facebook_user_feed'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Status = ClassRegistry::init('Status');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Status);

		parent::tearDown();
	}

}
