<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.facebook_achievement',
		'app.application',
		'app.facebook_activity',
		'app.page',
		'app.facebook_album',
		'app.facebook_user',
		'app.third_party',
		'app.facebook_project',
		'app.facebook_projects_facebook_user',
		'app.facebook_users_facebook_album',
		'app.facebook_event',
		'app.group',
		'app.facebook_users_facebook_event',
		'app.facebook_group',
		'app.owner_user',
		'app.owner_page',
		'app.parent_group',
		'app.parent_page',
		'app.parent_user',
		'app.facebook_users_facebook_group',
		'app.facebook_photo',
		'app.album',
		'app.page_story',
		'app.facebook_milestone',
		'app.facebook_photos_facebook_milestone',
		'app.facebook_users_facebook_photo',
		'app.facebook_video',
		'app.event',
		'app.facebook_users_facebook_video',
		'app.facebook_book',
		'app.facebook_comment',
		'app.achivement',
		'app.albums',
		'app.comment',
		'app.link',
		'app.milestone',
		'app.photo',
		'app.post',
		'app.status',
		'app.facebook_event_feed',
		'app.facebook_group_feed',
		'app.facebook_like',
		'app.video',
		'app.facebook_messages_tag',
		'app.tagging_post',
		'app.facebook_page_feed',
		'app.facebook_sharedpost',
		'app.facebook_user_feed',
		'app.rate',
		'app.twitter_status',
		'app.in_reply_to_user',
		'app.in_reply_to_status',
		'app.facebook_post',
		'app.facebook_status',
		'app.facebook_link',
		'app.facebook_device',
		'app.facebook_education',
		'app.facebook_family',
		'app.family_user',
		'app.facebook_friend',
		'app.friendlist',
		'app.facebook_game',
		'app.facebook_interest',
		'app.facebook_movie',
		'app.facebook_music',
		'app.facebook_names_tag',
		'app.facebook_picture',
		'app.facebook_posts_to',
		'app.groups',
		'app.facebook_posts_with_tag',
		'app.facebook_tag',
		'app.facebook_television',
		'app.facebook_work',
		'app.team',
		'app.admin',
		'app.log',
		'app.twitter_friendship'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
