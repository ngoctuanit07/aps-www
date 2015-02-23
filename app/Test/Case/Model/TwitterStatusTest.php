<?php
App::uses('TwitterStatus', 'Model');

/**
 * TwitterStatus Test Case
 *
 */
class TwitterStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.twitter_status',
		'app.user',
		'app.in_reply_to_user',
		'app.in_reply_to_status',
		'app.rate',
		'app.facebook_post',
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
		'app.status',
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
		$this->TwitterStatus = ClassRegistry::init('TwitterStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TwitterStatus);

		parent::tearDown();
	}

}
